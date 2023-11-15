<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\DB;
use App\Models\Docentes;
use App\Models\DocumentDocente;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use PDF;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Font;

class DocentesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $docentes = DB::table('docente')
        ->get();

        $pageTitle = 'Docentes'; // Título para la página del panel de control
        return view('docentes.index', ['docentes' => $docentes], compact('pageTitle'));
    }

    
    public function create()
    {
        $pageTitle = 'Docentes'; // Título para la página del panel de control
        return view('docentes.create', compact('pageTitle'));
    }

    
    public function store(Request $request)
    {
        DB::beginTransaction();

        try {
            // 1. Validar los datos del formulario
            $request->validate([
                'name_docente' => 'required',
                'dni' => [
                    'required',
                    'numeric',
                    'digits_between:8,8',
                    'unique:docente,dni'
                ],
                'password' => 'required',
                'imagen' => 'image|mimes:jpeg,png,jpg|max:2048',
            ]);

            // 2. Comprobar si se ha cargado una imagen
            if ($request->hasFile('imagen')) {
                $image = $request->file('imagen');
                $imageName = $request->dni . '.' . $image->getClientOriginalExtension();
                $imagePath = 'public/images/docente/' . $imageName;

                Storage::put($imagePath, file_get_contents($image));

            } else {
                $imageName = ""; // Establece la imagen como nula si no se ha cargado una
            }

            // 3. Guardar la información en la base de datos, incluyendo el nombre de la imagen
            $docente = new Docentes();
            $docente->nombre = $request->input('name_docente');
            $docente->apellidos = $request->input('apellidos_docente');
            $docente->designacion = $request->input('designacion');
            $docente->fecha_nacimiento = $request->input('fecha_nacimiento');
            $docente->genero = $request->input('genero');
            $docente->religion = $request->input('religion');
            $docente->email = $request->input('email');
            $docente->telefono = $request->input('telefono');
            $docente->direccion = $request->input('direccion');
            $docente->email = $request->input('email');
            $docente->fecha_ingreso = $request->input('fecha_ingreso');
            $docente->foto = $imageName; // Establece el nombre de la imagen
            $docente->dni = $request->input('dni');
            $docente->password = bcrypt($request->input('password'));
            $docente->rol_id = '3';
            $docente->fecha_creacion = Carbon::now()->toDateString();
            $docente->id_creacion = Auth::id();
            $docente->user_creacion = Auth::user()->name;
            $docente->tipo_creacion = 'Administrador';
            $docente->estado = 'activo';
            $docente->save();

            // 4. Redimensionar la imagen a 150x150
            if ($imageName) {
                $image = Image::make(Storage::get($imagePath));
                $image->fit(150, 150);
                Storage::put($imagePath, $image->encode());
            }

            DB::commit();

            toastr()->success('Docente registrado correctamente', 'Éxito');
            return redirect()->route('teacher.index');

        } catch (\Exception $e) {
            DB::rollBack();

            toastr()->error('Error: ' . $e->getMessage(), 'Error');

            return back()->withInput();
        }
    }

    
    public function show($id)
    {
        $docente = Docentes::find($id);

        $documentos = DB::table('document_docente')
        ->join('docente', 'docente.id_docente', '=', 'document_docente.id_docente')
        ->select('document_docente.*') // Selecciona todos los campos de document_docente
        ->where('document_docente.id_docente', $id) // Filtra por el id deseado
        ->get();

        foreach ($documentos as $documento) {
            $documento->tamañoMB = round(filesize(public_path('storage/document/docente/' . $documento->archivo)) / 1024 / 1024, 2);
        }

        // Organiza los documentos por fecha
        $documentosPorFecha = $documentos->groupBy(function ($documento) {
            return $documento->fecha; // Ajusta el nombre del campo de fecha si es diferente
        });

        $pageTitle = 'Docentes'; // Título para la página del panel de control
        return view('docentes.view',['docente' => $docente, 'documentosPorFecha' => $documentosPorFecha], compact('pageTitle'));
    }

    
    public function edit($id)
    {
        $docente = Docentes::find($id);

        $pageTitle = 'Docentes'; // Título para la página del panel de control
        return view('docentes.edit', ['docente' => $docente], compact('pageTitle'));
    }

    
    public function update(Request $request, $id)
    {
        try {
            $teacher = Docentes::find($id);
    
            if (!$teacher) {
                toastr()->error('El docente no se encontró en la base de datos', 'Error');
                return back();
            }
    
            // Validar los datos del formulario
            $request->validate([
                'name_docente_edit' => 'required',
                'apellidos_docente_edit' => 'required',
                'dni' => [
                    'required',
                    'numeric',
                    'digits_between:8,8',
                    Rule::unique('docente')->ignore($id, 'id_docente'),
                ],
                'email_edit' => 'email',
                'telefono_edit' => 'numeric',
                'imagen_editar' => 'image|mimes:jpeg,png,jpg|max:2048',
                'password_edit' => 'nullable|string|min:6', // Opcional si deseas cambiar la contraseña
            ]);
    
            // Actualizar los campos que no son contraseñas
            $teacher->nombre = $request->input('name_docente_edit');
            $teacher->apellidos = $request->input('apellidos_docente_edit');
            $teacher->designacion = $request->input('designacion_edit');
            $teacher->fecha_nacimiento = $request->input('fecha_nacimiento_edit');
            $teacher->genero = $request->input('genero_edit');
            $teacher->religion = $request->input('religion_edit');
            $teacher->email = $request->input('email_edit');
            $teacher->telefono = $request->input('telefono_edit');
            $teacher->direccion = $request->input('direccion_edit');
            $teacher->fecha_ingreso = $request->input('fecha_ingreso_edit');
            $teacher->dni = $request->input('dni');
            $teacher->fecha_modificacion = Carbon::now()->toDateString();
    
            // Verificar si se ha enviado una nueva imagen
            if ($request->hasFile('imagen_editar')) {
                // Eliminar la imagen anterior si existe
                if (!empty($teacher->foto)) {
                    Storage::delete('public/images/docente/' . $teacher->foto);
                }
    
                // Guardar la nueva imagen
                $image = $request->file('imagen_editar');
                $imageName = $request->dni . '.' . $image->getClientOriginalExtension();
                $imagePath = 'public/images/docente/' . $imageName;
                Storage::put($imagePath, file_get_contents($image));
                $teacher->foto = $imageName;
    
                // Redimensionar la nueva imagen a 150x150
                $image = Image::make(Storage::get($imagePath));
                $image->fit(150, 150);
                Storage::put($imagePath, $image->encode());
            }
    
            // Verificar si se ha enviado una nueva contraseña
            if ($request->has('password_edit')) {
                $teacher->password = Hash::make($request->input('password_edit'));
            }
    
            // Guardar los cambios en la base de datos
            $teacher->save();
    
            toastr()->success('Docente actualizado correctamente', 'Éxito');
    
            return redirect()->route('teacher.index');
    
        } catch (\Exception $e) {
    
            toastr()->error('Error: ' . $e->getMessage(), 'Error');
            return back();
        }
    }

    
    public function destroy($id)
    {
        $docente = Docentes::find($id);

        if ($docente) {
            // Verificar si el usuario tiene una imagen
            if ($docente->foto) {
                // Eliminar la imagen del sistema de almacenamiento
                $imagePath = 'public/images/docente/' . $docente->foto;
                if (Storage::exists($imagePath)) {
                    Storage::delete($imagePath);
                }
            }
    
            // Eliminar el usuario
            $docente->delete();
    
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false]);
        }
    }

    public function pdf ()
    {
        $docentes = Docentes::all();
    	$pdf = PDF::loadView('docentes.reportepdf', compact('docentes'));
    	return $pdf->setPaper('a4', 'landscape')->download('docentes.pdf');

        // stream
    }

    public function excel()
    {
        // Crea una instancia de una hoja de cálculo
        $spreadsheet = new Spreadsheet();

        // Agrega datos a la hoja de cálculo (puedes personalizar esto según tus necesidades)
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setTitle("Docentes");

        $sheet->setCellValue('A1', 'Nro');
        $sheet->setCellValue('B1', 'Nombre');
        $sheet->setCellValue('C1', 'Apellidos');
        $sheet->setCellValue('D1', 'Designacion');
        $sheet->setCellValue('E1', 'Fecha Nacimiento');
        $sheet->setCellValue('F1', 'Genero');
        $sheet->setCellValue('G1', 'Religion');
        $sheet->setCellValue('H1', 'Correo Electronico');
        $sheet->setCellValue('I1', 'Telefono');
        $sheet->setCellValue('J1', 'Direccion');
        $sheet->setCellValue('K1', 'Fecha Ingreso');
        $sheet->setCellValue('L1', 'Dni');

        $docentes = DB::table('docente')->get();
        $fila = 2;
        $nro = 1; // Inicializa el contador de Nro

        foreach ($docentes as $docente) {
            $sheet->setCellValue('A' . $fila, $nro);
            $sheet->setCellValue('B' . $fila, $docente->nombre);
            $sheet->setCellValue('C' . $fila, $docente->apellidos);
            $sheet->setCellValue('D' . $fila, $docente->designacion);
            $sheet->setCellValue('E' . $fila, $docente->fecha_nacimiento);
            $sheet->setCellValue('F' . $fila, $docente->genero);
            $sheet->setCellValue('G' . $fila, $docente->religion);
            $sheet->setCellValue('H' . $fila, $docente->email);
            $sheet->setCellValue('I' . $fila, $docente->telefono);
            $sheet->setCellValue('J' . $fila, $docente->direccion);
            $sheet->setCellValue('K' . $fila, $docente->fecha_ingreso);
            $sheet->setCellValue('L' . $fila, $docente->dni);
        
            $fila++;
            $nro++; // Incrementa el contador de Nro
        }

        for ($col = 'A'; $col <= 'L'; $col++) {
            $sheet->getColumnDimension($col)->setAutoSize(true);
            $sheet->getStyle($col . '1')->getFont()->setBold(true);
        }

        // Configura el encabezado de la respuesta para descargar el archivo Excel
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="docentes.xlsx"');
        header('Cache-Control: max-age=0');

        $writer = new Xlsx($spreadsheet);

        // Envia el archivo Excel al navegador
        $writer->save('php://output');

        exit;
    }

    public function switch(Request $request, $id)
    {
        try {
            $docente = Docentes::find($id);
            $docente->estado = $request->estado;
            $docente->save();
            
            return response()->json(['message' => 'Estado actualizado correctamente']);
        } catch (\Exception $e) {
            // Registra el error
            \Log::error($e->getMessage());
            return response()->json(['message' => 'Ha ocurrido un error al actualizar el estado'], 500);
        }
    }

    public function SaveDocumento (Request $request)
    {
        
        try {
            // Validaciones
            $request->validate([
                'title_docente' => 'required|string|max:255|unique_title_with_teacher_id',
                'archivo_docente' => 'required|file|mimes:pdf,doc,docx,xlsx,ppt,rar,zip',
                'id_docente' => 'required|integer',
            ]);
    
            $file = $request->file('archivo_docente');
            $originalFileName = $file->getClientOriginalName();

            $idDocente = $request->input('id_docente'); // Obtén el valor de 'id' desde el formulario
            $extension = $file->getClientOriginalExtension();
    
            
            $fileName = $request->input('title_docente') . $idDocente . '.' . $extension;
    
            // Guardar el archivo en la carpeta de almacenamiento con el nuevo nombre
            $file->storeAs('public/document/docente', $fileName);
    
            // Guardar la información en la base de datos
            $docentedoc = new DocumentDocente();
            $docentedoc->titulo = $request->input('title_docente');
            $docentedoc->archivo = $fileName;
            $docentedoc->fecha = Carbon::now()->toDateString();
            $docentedoc->id_docente = $request->input('id_docente');
            $docentedoc->save();
    
            
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
        $filePath = storage_path('app/public/document/docente/' . $archivo);

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
        $documento = DocumentDocente::find($id);

        if ($documento) {
            // Ruta del archivo en la carpeta de almacenamiento
            $filePath = storage_path('app/public/document/docente/' . $documento->archivo);

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
