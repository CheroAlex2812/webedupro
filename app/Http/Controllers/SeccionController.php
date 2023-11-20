<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Grados;
use App\Models\Seccion;

class SeccionController extends Controller
{
    
    public function index()
    {

        $seccion = DB::table('seccion as c')
        ->join('docente as d', 'd.id_docente', '=', 'c.docente_id')
        ->join('grado as g', 'g.id_grado', '=', 'c.grado_id')
        ->select('c.*', 'd.nombre as nombre_docente', 'g.grado as nombre_grado')
        ->get();

        $pageTitle = 'Sección'; // Título para la página del panel de control
        return view('seccion.index', ['seccion' => $seccion], compact('pageTitle'));
    }

    
    public function create()
    {
        $docentes = DB::table('docente')
        ->get();

        $grados = DB::table('grado')
        ->get();

        $pageTitle = 'Sección'; // Título para la página del panel de control
        return view('seccion.create', ['docentes' => $docentes, 'grados' => $grados], compact('pageTitle'));
    }

    
    public function store(Request $request)
    {
        try {
            // Validación de datos del formulario
            $request->validate([
                'seccion' => 'required|string|max:100',
                'categoria' => 'required|string|max:100',
                'grado' => 'required|exists:grado,id_grado', // Asegúrate de que el ID del grado exista en la tabla 'grado'
                'capacidad' => 'required|integer|gt:0',
                'docente' => 'required|exists:docente,id_docente', // Asegúrate de que el ID del docente exista en la tabla 'docente'
                'nota' => 'nullable|string',
            ], [
                'capacidad.gt' => 'La capacidad debe ser mayor que cero.',
            ]);

            // Crear una nueva instancia del modelo y asignar los valores
            $seccion = new Seccion();
            $seccion->seccion = $request->input('seccion');
            $seccion->categoria = $request->input('categoria');
            $seccion->grado_id = $request->input('grado');
            $seccion->capacidad = $request->input('capacidad');
            $seccion->docente_id = $request->input('docente');
            $seccion->nota = $request->input('nota');

            // Guardar el objeto en la base de datos
            $seccion->save();

            // Redireccionar a la página de éxito o a la página deseada
            toastr()->success('Sección creada exitosamente', 'Éxito');
            return redirect()->route('section.index');

        } catch (\Exception $e) {
            // Manejar otras excepciones
            toastr()->error('Ha ocurrido un error al crear la sección. Por favor, intenta de nuevo.', 'Error');
            return redirect()->back();
        }
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        $seccion = Seccion::find($id);

        $docentes = DB::table('docente')
        ->get();

        $grados = DB::table('grado')
        ->get();

        $pageTitle = 'Sección'; // Título para la página del panel de control
        return view('seccion.edit', ['seccion' => $seccion, 'docentes' => $docentes, 'grados' => $grados], compact('pageTitle'));
    }

    
    public function update(Request $request, $id)
    {
        try {

            $seccion = Seccion::find($id);
    
            if (!$seccion) {
                toastr()->error('La sección no se encontró en la base de datos', 'Error');
                return back();
            }

            // Validación de datos del formulario
            $request->validate([
                'seccion_edit' => 'required|string|max:100',
                'categoria_edit' => 'required|string|max:100',
                'grado_edit' => 'required|exists:grado,id_grado',
                'capacidad_edit' => 'required|integer|gt:0',
                'docente_edit' => 'required|exists:docente,id_docente',
                'nota_edit' => 'nullable|string',
            ], [
                'capacidad_edit.gt' => 'La capacidad debe ser mayor que cero.',
            ]);

            
            $seccion->seccion = $request->input('seccion_edit');
            $seccion->categoria = $request->input('categoria_edit');
            $seccion->grado_id = $request->input('grado_edit');
            $seccion->capacidad = $request->input('capacidad_edit');
            $seccion->docente_id = $request->input('docente_edit');
            $seccion->nota = $request->input('nota_edit');

            // Guardar el objeto en la base de datos
            $seccion->save();

            // Redireccionar a la página de éxito o a la página deseada
            toastr()->success('Sección actualizada exitosamente', 'Éxito');
            return redirect()->route('section.index');

        } catch (\Exception $e) {
            // Manejar otras excepciones
            toastr()->error('Ha ocurrido un error al actualizar la sección. Por favor, intenta de nuevo.', 'Error');
            return redirect()->back();
        }
    }

    
    public function destroy($id)
    {
        $seccion = Seccion::find($id);

        if ($seccion) {

            // Eliminar
            $seccion->delete();
    
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false]);
        }
    }

    public function getCapacity($gradoId)
    {
        try {
            // Obtener la capacidad del grado seleccionado
            $capacidadGrado = Grados::find($gradoId)->cant_estudiante;

            // Obtener la suma de las capacidades de las secciones asociadas al grado
            $capacidadSecciones = Seccion::where('grado_id', $gradoId)->sum('capacidad');

            // Retornar la respuesta como JSON
            return response()->json([
                'success' => true,
                'capacity' => $capacidadGrado,
                'sections' => $capacidadSecciones,
            ]);

        } catch (\Exception $e) {
            // Manejar cualquier excepción
            return response()->json(['success' => false, 'message' => 'Error al obtener la capacidad y las secciones.']);
        }
    }
}
