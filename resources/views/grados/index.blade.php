@extends('layouts.admin')

@section('contenido')

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">EduWebPro</a></li>
                    <li class="breadcrumb-item active">Grados</li>
                </ol>
            </div>
            <h4 class="page-title">Grados</h4>
        </div>
    </div>
</div>     
<!-- end page title --> 

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row mb-2">
                    <div class="col-sm-4">
                        <a href="{{ route('grade.create') }}" class="btn btn-danger mb-2"><i class="mdi mdi-plus-circle me-2"></i> Agregar Grado</a>
                    </div>
                    <div class="col-sm-8">
                        <div class="text-sm-end">
                            <button type="button" class="btn btn-success mb-2 me-1"><i class="mdi mdi-cog"></i></button>
                            <button type="button" class="btn btn-light mb-2 me-1">Import</button>
                            <button type="button" class="btn btn-light mb-2">Export</button>
                        </div>
                    </div><!-- end col-->
                </div>

                <div class="table-responsive" data-simplebar>
                    <table class="table table-centered table-striped nowrap w-100" id="grade-datatable">
                        <thead>
                            <tr>
                                <th style="width: 20px;">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="customCheck1">
                                        <label class="form-check-label" for="customCheck1">&nbsp;</label>
                                    </div>
                                </th>
                                <th>Grado</th>
                                <th>Nro. de Grado</th>
                                <th>Nombre del Docente</th>
                                <th>Cant. de Estudiantes</th>
                                <th>Secciones</th>
                                <th>Nota</th>
                                <th style="width: 75px;">Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($grados as $grado)
                            <tr>
                                <td>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="customCheck{{ $grado->id_grado }}">
                                        <label class="form-check-label" for="customCheck{{ $grado->id_grado }}">&nbsp;</label>
                                    </div>
                                </td>
                                <td>
                                    {{ $grado->grado }}
                                </td>
                                <td>
                                    {{ $grado->identificador }}
                                </td>
                                <td>
                                    {{ $grado->nombre_docente }}
                                </td>
                                <td>
                                    {{ $grado->cant_estudiante }}
                                </td>
                                <td>
                                    {{ $grado->secciones }}
                                </td>
                                <td>
                                    {{ $grado->nota }}
                                </td>

                                <td>
                                    <a href="{{ route('grade.edit', $grado->id_grado) }}" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>

                                    <a href="javascript:void(0);" class="action-icon delete-button" data-grado-id="{{ $grado->id_grado }}"> <i class="mdi mdi-delete"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col -->
</div>
<!-- end row -->

@endsection

@section('scripts')

<script src="{{asset('js/vendor/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('js/vendor/dataTables.bootstrap5.js')}}"></script>
<script src="{{asset('js/vendor/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('js/vendor/responsive.bootstrap5.min.js')}}"></script>
<script src="{{asset('js/vendor/dataTables.checkboxes.min.js')}}"></script>

<script src="{{asset('js/pages/grados/index.js')}}"></script>
@endsection