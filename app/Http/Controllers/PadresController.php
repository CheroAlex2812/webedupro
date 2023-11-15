<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\DB;
use App\Models\Padres;
use App\Models\DocumentPadre;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

class PadresController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {

        $padres = DB::table('padres')
        ->get();

        $pageTitle = 'Padres'; // Título para la página del panel de control
        return view('padres.index', ['padres' => $padres], compact('pageTitle'));
    }

    
    public function create()
    {
        $pageTitle = 'Padres'; // Título para la página del panel de control
        return view('padres.create', compact('pageTitle'));
    }

    
    public function store(Request $request)
    {
        DB::beginTransaction();

        try {
            // 1. Validar los datos del formulario
            $request->validate([
                'name_tutor' => 'required',
                'dni' => [
                    'required',
                    'numeric',
                    'digits_between:8,8',
                    'unique:padres,dni'
                ],
                'password' => 'required',
                'imagen' => 'image|mimes:jpeg,png,jpg|max:2048',
            ]);

            // 2. Comprobar si se ha cargado una imagen
            if ($request->hasFile('imagen')) {
                $image = $request->file('imagen');
                $imageName = $request->dni . '.' . $image->getClientOriginalExtension();
                $imagePath = 'public/images/' . $imageName;

                Storage::put($imagePath, file_get_contents($image));
            } else {
                $imageName = ""; // Establece la imagen como nula si no se ha cargado una
            }

            // 3. Guardar la información en la base de datos, incluyendo el nombre de la imagen
            $parent = new Padres();
            $parent->nombre_tutor = $request->input('name_tutor');
            $parent->apellidos_tutor = $request->input('apellidos_tutor');
            $parent->nombre_padre = $request->input('name_padre');
            $parent->nombre_madre = $request->input('name_madre');
            $parent->profesion_padre = $request->input('profesion_padre');
            $parent->profesion_madre = $request->input('profesion_madre');
            $parent->email = $request->input('email');
            $parent->telefono = $request->input('telefono');
            $parent->direccion = $request->input('direccion');
            $parent->fecha_creacion = Carbon::now()->toDateString();
            $parent->dni = $request->input('dni');
            $parent->password = bcrypt($request->input('password'));
            $parent->imagen = $imageName; // Establece el nombre de la imagen
            $parent->estado = 'activo';
            $parent->save();

            // 4. Redimensionar la imagen a 150x150
            if ($imageName) {
                $image = Image::make(Storage::get($imagePath));
                $image->fit(150, 150);
                Storage::put($imagePath, $image->encode());
            }

            DB::commit();

            toastr()->success('Padre registrado correctamente', 'Éxito');
            return redirect()->route('parents.index');

        } catch (\Exception $e) {
            DB::rollBack();

            toastr()->error('Error: ' . $e->getMessage(), 'Error');

            return back()->withInput();
        }
    }

    
    public function show($id)
    {

        $parent = Padres::find($id);

        $documentos = DB::table('document_padre')
        ->join('padres', 'padres.id_padre', '=', 'document_padre.id_padre')
        ->select('document_padre.*') // Selecciona todos los campos de document_padre
        ->where('document_padre.id_padre', $id) // Filtra por el id_padre deseado
        ->get();

        foreach ($documentos as $documento) {
            $documento->tamañoMB = round(filesize(public_path('storage/document/' . $documento->archivo)) / 1024 / 1024, 2);
        }

        // Organiza los documentos por fecha
        $documentosPorFecha = $documentos->groupBy(function ($documento) {
            return $documento->fecha; // Ajusta el nombre del campo de fecha si es diferente
        });

        $pageTitle = 'Padres'; // Título para la página del panel de control
        return view('padres.view',['parent' => $parent, 'documentosPorFecha' => $documentosPorFecha], compact('pageTitle'));
    }

    
    public function edit($id)
    {
        $padre = Padres::find($id);

        $pageTitle = 'Padres'; // Título para la página del panel de control
        return view('padres.edit', ['padre' => $padre], compact('pageTitle'));
    }

    
    public function update(Request $request, $id)
    {
        try {
            $parent = Padres::find($id);
    
            if (!$parent) {
                toastr()->error('El padre no se encontró en la base de datos', 'Error');
                return back();
            }
    
            // Validar los datos del formulario
            $request->validate([
                'name_tutor_edit' => 'required',
                'apellidos_tutor_edit' => 'required',
                'dni' => [
                    'required',
                    'numeric',
                    'digits_between:8,8',
                    Rule::unique('padres')->ignore($id, 'id_padre'),
                ],
                'email_edit' => 'email',
                'telefono_edit' => 'numeric',
                'imagen_editar' => 'image|mimes:jpeg,png,jpg|max:2048',
            ]);
    
            // Actualizar los campos que no son contraseñas
            $parent->nombre_tutor = $request->input('name_tutor_edit');
            $parent->apellidos_tutor = $request->input('apellidos_tutor_edit');
            $parent->nombre_padre = $request->input('name_padre_edit');
            $parent->nombre_madre = $request->input('name_madre_edit');
            $parent->profesion_padre = $request->input('profesion_padre_edit');
            $parent->profesion_madre = $request->input('profesion_madre_edit');
            $parent->email = $request->input('email_edit');
            $parent->telefono = $request->input('telefono_edit');
            $parent->direccion = $request->input('direccion_edit');
            $parent->dni = $request->input('dni');
    
            // Verificar si se ha enviado una nueva imagen
            if ($request->hasFile('imagen_editar')) {
                // Eliminar la imagen anterior si existe
                if (!empty($parent->imagen)) {
                    Storage::delete('public/images/' . $parent->imagen);
                }
    
                // Guardar la nueva imagen
                $image = $request->file('imagen_editar');
                $imageName = $request->dni . '.' . $image->getClientOriginalExtension();
                $imagePath = 'public/images/' . $imageName;
                Storage::put($imagePath, file_get_contents($image));
                $parent->imagen = $imageName;
    
                // Redimensionar la nueva imagen a 150x150
                $image = Image::make(Storage::get($imagePath));
                $image->fit(150, 150);
                Storage::put($imagePath, $image->encode());
            }
    
            // Verificar si se ha enviado una nueva contraseña
            if ($request->has('password_edit')) {
                $parent->password = Hash::make($request->input('password_edit'));
            }
    
            // Guardar los cambios en la base de datos
            $parent->save();

            toastr()->success('Padre actualizado correctamente', 'Éxito');
    
            return redirect()->route('parents.index');

        } catch (\Exception $e) {

            toastr()->error('Error: ' . $e->getMessage(), 'Error');
            return back();
        }
    }

    
    public function destroy($id)
    {
        $padre = Padres::find($id);

        if ($padre) {
            // Verificar si el usuario tiene una imagen
            if ($padre->imagen) {
                // Eliminar la imagen del sistema de almacenamiento
                $imagePath = 'public/images/' . $padre->imagen;
                if (Storage::exists($imagePath)) {
                    Storage::delete($imagePath);
                }
            }
    
            // Eliminar el usuario
            $padre->delete();
    
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false]);
        }
    }

    public function switch(Request $request, $id)
    {
        try {
            $padre = Padres::find($id);
            $padre->estado = $request->estado;
            $padre->save();
            
            return response()->json(['message' => 'Estado actualizado correctamente']);
        } catch (\Exception $e) {
            // Registra el error
            \Log::error($e->getMessage());
            return response()->json(['message' => 'Ha ocurrido un error al actualizar el estado'], 500);
        }
    }

    public function savedocument(Request $request)
    {
        try {
            // Validaciones
            $request->validate([
                'title' => 'required|string|max:255|unique_title_with_parent_id',
                'archivo' => 'required|file|mimes:pdf,doc,docx,xlsx,ppt,rar,zip',
                'id_padre' => 'required|integer', // Asegúrate de tener el campo 'id_padre' en el formulario
            ]);
    
            $file = $request->file('archivo');
            $originalFileName = $file->getClientOriginalName();

            $idPadre = $request->input('id_padre'); // Obtén el valor de 'id_padre' desde el formulario
            $extension = $file->getClientOriginalExtension();
    
            
            $fileName = $request->input('title') . $idPadre . '.' . $extension;
    
            // Guardar el archivo en la carpeta de almacenamiento con el nuevo nombre
            $file->storeAs('public/document', $fileName);
    
            // Guardar la información en la base de datos
            $document = new DocumentPadre();
            $document->titulo = $request->input('title');
            $document->archivo = $fileName;
            $document->fecha = Carbon::now()->toDateString();
            $document->id_padre = $request->input('id_padre');
            $document->save();
    
            
            // Mensaje de éxito
            toastr()->success('Documento guardado exitosamente', 'Éxito');
            return redirect()->back();
    
        } catch (\Exception $e) {
            // Manejo de errores y mensaje de error
            toastr()->error('Error al guardar el documento:'. $e->getMessage(), 'Error');
            return redirect()->back();
        }
    }

    public function download($archivo)
    {
        // Ruta del archivo en la carpeta de almacenamiento
        $filePath = storage_path('app/public/document/' . $archivo);

        // Verifica si el archivo existe
        if (file_exists($filePath)) {
            return response()->download($filePath, $archivo);
        } else {
            // Manejo de errores si el archivo no existe
            toastr()->error('El archivo no existe o ha sido eliminado.', 'Error');
            return redirect()->back();
        }
    }

    public function delete($id)
    {
        // Buscar el registro en la base de datos
        $documento = DocumentPadre::find($id);

        if ($documento) {
            // Ruta del archivo en la carpeta de almacenamiento
            $filePath = storage_path('app/public/document/' . $documento->archivo);

            // Verifica si el archivo existe
            if (file_exists($filePath)) {
                // Elimina el archivo
                unlink($filePath);
            }

            // Elimina el registro en la base de datos
            $documento->delete();

            // Redirecciona con un mensaje de éxito
            toastr()->success('El archivo ha sido eliminado exitosamente.', 'Éxito');
            return redirect()->back();
        } else {
            // Manejo de errores si el registro no se encuentra
            toastr()->error('El archivo no se encuentra en la base de datos.', 'Error');
            return redirect()->back();
        }
    }

    
}
