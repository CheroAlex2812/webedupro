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
                    <li class="breadcrumb-item active">Editar</li>
                </ol>
            </div>
            <h4 class="page-title">Editar Sección</h4>
        </div>
    </div>
</div>     
<!-- end page title --> 

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('section.update', $seccion->id_seccion) }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="mb-3">
                                <label for="seccion_edit" class="form-label">Sección <span class="text-danger">*</span></label>
                                <input type="text" name="seccion_edit" id="seccion_edit" class="form-control" placeholder="Ingrese Sección" value="{{$seccion->seccion}}" required>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="mb-3">
                                <label for="categoria_edit" class="form-label">Categoría <span class="text-danger">*</span></label>
                                <input type="text" name="categoria_edit" id="categoria_edit" class="form-control" placeholder="Ingrese Categoría" value="{{$seccion->categoria}}" required>
                            </div>
                        </div>
                        
                        <div class="col-xl-6">
                            <div class="mb-3">
                                <label for="grado_edit" class="form-label"> Grado <span class="text-danger">*</span></label>
                                <select class="form-control select2" data-toggle="select2" name="grado_edit">
                                    <option>Seleccionar grado</option>
                                    @foreach($grados as $grado)
                                        <option value="{{ $grado->id_grado }}" @if($grado->id_grado == $seccion->grado_id) selected @endif>
                                            {{ $grado->grado }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-xl-6">
                            <div class="mb-3">
                                <label for="capacidad_edit" class="form-label">Capacidad <span class="text-danger">*</span></label>
                                <input type="text" name="capacidad_edit" id="capacidad_edit" class="form-control" placeholder="Ingrese Capacidad" value="{{$seccion->capacidad}}" required>
                            </div>
                        </div>

                        <div class="col-xl-6">
                            <div class="mb-3">
                                <label for="docente_edit" class="form-label"> Docente <span class="text-danger">*</span></label>
                                <select class="form-control select2" data-toggle="select2" name="docente_edit">
                                    <option>Seleccionar docente</option>
                                    @foreach($docentes as $docente)
                                        <option value="{{ $docente->id_docente }}" @if($docente->id_docente == $seccion->docente_id) selected @endif>
                                            {{ $docente->nombre }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-xl-6">
                            <div class="mb-3">
                                <label for="nota_edit" class="form-label">Nota </label>
                                <textarea class="form-control" name="nota_edit" id="nota_edit" rows="5">{{$seccion->nota}}</textarea>
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
    <script src="{{asset('js/pages/seccion/edit.js')}}"></script>
@endsection