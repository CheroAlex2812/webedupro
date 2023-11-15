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
                    <li class="breadcrumb-item active">Agregar</li>
                </ol>
            </div>
            <h4 class="page-title">Agregar Grado</h4>
        </div>
    </div>
</div>     
<!-- end page title --> 

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('grade.guardar') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="mb-3">
                                <label for="grado" class="form-label">Grado <span class="text-danger">*</span></label>
                                <input type="text" name="grado" id="grado" class="form-control" placeholder="Ingrese Grado" required>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="mb-3">
                                <label for="identificador" class="form-label">Identificador de Grado <span class="text-danger">*</span></label>
                                <input type="text" name="identificador" id="identificador" class="form-control" placeholder="Ingrese Identificador" required>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="mb-3">
                                <label for="cant_estudiante" class="form-label">Cantidad de Estudiantes <span class="text-danger">*</span></label>
                                <input type="text" name="cant_estudiante" id="cant_estudiante" class="form-control" placeholder="Ingrese Cantidad" required>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="mb-3">
                                <label for="docente" class="form-label"> Nombre del Docente <span class="text-danger">*</span></label>
                                <select class="form-control select2" data-toggle="select2" name="docente">
                                    <option>Seleccionar docente</option>
                                    @foreach($docentes as $docente)
                                        <option value="{{ $docente->id_docente }}">{{ $docente->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="mb-3">
                                <label for="nota" class="form-label">Nota </label>
                                <textarea class="form-control" name="nota" id="nota" rows="5"></textarea>
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