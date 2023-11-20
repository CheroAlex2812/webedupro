@extends('layouts.admin')

@section('contenido')

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">EduWebPro</a></li>
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Grados</a></li>
                    <li class="breadcrumb-item active">Editar</li>
                </ol>
            </div>
            <h4 class="page-title">Editar Grado</h4>
        </div>
    </div>
</div>     
<!-- end page title --> 

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('grade.update', $grado->id_grado) }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="mb-3">
                                <label for="grado_edit" class="form-label">Grado <span class="text-danger">*</span></label>
                                <input type="text" name="grado_edit" id="grado_edit" class="form-control" placeholder="Ingrese Grado" value="{{$grado->grado}}" required>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="mb-3">
                                <label for="identificador_edit" class="form-label">Identificador de Grado <span class="text-danger">*</span></label>
                                <input type="text" name="identificador_edit" id="identificador_edit" class="form-control" placeholder="Ingrese Identificador" value="{{$grado->identificador}}" required>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="mb-3">
                                <label for="cant_estudiante_edit" class="form-label">Cantidad de Estudiantes <span class="text-danger">*</span></label>
                                <input type="text" name="cant_estudiante_edit" id="cant_estudiante_edit" class="form-control" placeholder="Ingrese Cantidad" value="{{$grado->cant_estudiante}}" required>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="mb-3">
                                <label for="docente_edit" class="form-label"> Nombre del Docente <span class="text-danger">*</span></label>
                                <select class="form-control select2" data-toggle="select2" name="docente_edit">
                                    <option>Seleccionar docente</option>
                                    {{-- @foreach($docentes as $docente)
                                        @if ($docente->id_docente == $grado->docente_id)
                                            <option value="{{ $docente->id_docente }}" selected>{{ $docente->nombre }}</option>
                                        @else
                                            <option value="{{ $docente->id_docente }}">{{ $docente->nombre }}</option> 
                                        @endif
                                    @endforeach --}}
                                    @foreach($docentes as $docente)
                                        <option value="{{ $docente->id_docente }}" @if($docente->id_docente == $grado->docente_id) selected @endif>
                                            {{ $docente->nombre }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="mb-3">
                                <label for="nota_edit" class="form-label">Nota </label>
                                <textarea class="form-control" name="nota_edit" id="nota_edit" rows="5">{{$grado->nota}}</textarea>
                            </div>
                        </div>

                        <div class="alert alert-info alert-dismissible fade show" role="alert">
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            <i class="dripicons-information me-2"></i><strong>Info - </strong> Agregar un docente antes de crear un nuevo grado.
                        </div>

                        <div class="mb-3 text-center">
                            <button type="submit" class="btn btn-primary mx-1"><i class="mdi mdi-content-save"></i> Guardar</button>
                            <button type="button" onclick="previous()" class="btn btn-secondary mx-1"> <i class="fa-solid fa-rotate-left"></i> Cancelar</button>
                        </div>
                    </div>
                </form>
            </div> <!-- end card-body -->
        </div> <!-- end card -->
    </div> <!-- end col -->
</div>

<!-- end row -->


@endsection

@section('scripts')
    <script src="{{asset('js/pages/grados/create.js')}}"></script>
@endsection