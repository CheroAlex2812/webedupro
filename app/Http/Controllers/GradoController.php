<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Grados;

class GradoController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $grados = DB::table('grado as g')
        ->join('docente as d', 'd.id_docente', '=', 'g.docente_id')
        ->select('g.*', 'd.nombre as nombre_docente')
        ->get();

        $pageTitle = 'Grado'; // Título para la página del panel de control
        return view('grados.index', ['grados' => $grados], compact('pageTitle'));
    }

    
    public function create()
    {
        $docentes = DB::table('docente')
        ->get();

        $pageTitle = 'Grado'; // Título para la página del panel de control
        return view('grados.create', ['docentes' => $docentes], compact('pageTitle'));
    }

    
    public function store(Request $request)
    {
        try {
            // Validación de datos del formulario
            $request->validate([
                'grado' => 'required|string|max:255',
                'identificador' => 'required|string|max:255',
                'cant_estudiante' => 'required|integer',
                'docente' => 'required|exists:docente,id_docente', // Asegúrate de que el ID del docente exista en la tabla 'docente'
                'nota' => 'nullable|string',
            ]);
    
            // Crear un nuevo objeto Grado con los datos del formulario
            $grado = new Grados();
            $grado->grado = $request->input('grado');
            $grado->identificador = $request->input('identificador');
            $grado->cant_estudiante = $request->input('cant_estudiante');
            $grado->docente_id = $request->input('docente');
            $grado->nota = $request->input('nota');
    
            // Guardar el objeto Grado en la base de datos
            $grado->save();
    
            // Redireccionar a la página de éxito o a la página deseada
            toastr()->success('Docente creado exitosamente', 'Éxito');
            return redirect()->route('grade.index');
        } catch (ValidationException $e) {
            // Manejar la excepción de validación
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            // Manejar otras excepciones
            toastr()->error('Ha ocurrido un error al guardar el grado. Por favor, intenta de nuevo.', 'Error');
            return redirect()->back();
        }
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
        //
    }

    
    public function destroy($id)
    {
        //
    }
}
