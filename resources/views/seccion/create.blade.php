@extends('layouts.admin')

@section('contenido')

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">EduWebPro</a></li>
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Sección</a></li>
                    <li class="breadcrumb-item active">Agregar</li>
                </ol>
            </div>
            <h4 class="page-title">Agregar Sección</h4>
        </div>
    </div>
</div>     
<!-- end page title --> 

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('section.guardar') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="mb-3">
                                <label for="seccion" class="form-label">Sección <span class="text-danger">*</span></label>
                                <input type="text" name="seccion" id="seccion" class="form-control" placeholder="Ingrese Sección" required>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="mb-3">
                                <label for="categoria" class="form-label">Categoría <span class="text-danger">*</span></label>
                                <input type="text" name="categoria" id="categoria" class="form-control" placeholder="Ingrese Categoría" required>
                            </div>
                        </div>
                        
                        <div class="col-xl-6">
                            <div class="mb-3">
                                <label for="grado" class="form-label"> Grado <span class="text-danger">*</span></label>
                                <select class="form-control select2" data-toggle="select2" name="grado">
                                    <option>Seleccionar grado</option>
                                    @foreach($grados as $grado)
                                        <option value="{{ $grado->id_grado }}">{{ $grado->grado }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-xl-6">
                            <div class="mb-3">
                                <label for="capacidad" class="form-label">Capacidad <span class="text-danger">*</span></label>
                                <input type="text" name="capacidad" id="capacidad" class="form-control" placeholder="Ingrese Capacidad" required>
                            </div>
                        </div>

                        <div class="col-xl-6">
                            <div class="mb-3">
                                <label for="docente" class="form-label"> Docente <span class="text-danger">*</span></label>
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
                            <i class="dripicons-information me-2"></i><strong>Info - </strong> Agregar un grado y un docente antes de agregar una nueva sección.
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
    <script src="{{asset('js/pages/seccion/create.js')}}"></script>
@endsection