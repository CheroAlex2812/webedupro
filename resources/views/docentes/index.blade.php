@extends('layouts.admin')

@section('contenido')

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">EduWebPro</a></li>
                    <li class="breadcrumb-item active">Docentes</li>
                </ol>
            </div>
            <h4 class="page-title">Docentes</h4>
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
                        <a href="{{ route('teacher.create') }}" class="btn btn-danger mb-2"><i class="mdi mdi-plus-circle me-2"></i> Agregar Docente</a>
                    </div>
                    <div class="col-sm-8">
                        <div class="text-sm-end">

                            {{-- <button type="button" class="btn btn-success mb-2 me-1">
                                <i class="mdi mdi-cog"></i>
                            </button> --}}

                            <a href="{{ route('descargarPDF') }}" type="button" class="btn btn-outline-danger mb-2 me-1">
                                <i class="fa-solid fa-file-pdf"></i> 
                            </a>

                            <a href="{{ route('descargarEXCEL') }}" type="button" class="btn btn-outline-success mb-2">
                                <i class="fa-solid fa-file-excel"></i> 
                            </a>

                        </div>
                    </div><!-- end col-->
                </div>

                <div class="table-responsive" data-simplebar>
                    <table class="table table-centered table-striped nowrap w-100" id="teacher-datatable">
                        <thead>
                            <tr>
                                <th style="width: 20px;">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="customCheck1">
                                        <label class="form-check-label" for="customCheck1">&nbsp;</label>
                                    </div>
                                </th>
                                <th>Docente</th>
                                <th>Telefono</th>
                                <th>Correo Electrónico</th>
                                <th>Dirección</th>
                                <th>Fecha Creación</th>
                                <th>Estado</th>
                                <th style="width: 75px;">Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($docentes as $docente)
                            <tr>
                                <td>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="customCheck{{ $docente->id_docente }}">
                                        <label class="form-check-label" for="customCheck{{ $docente->id_docente }}">&nbsp;</label>
                                    </div>
                                </td>
                                <td class="table-user">
                                    @if($docente->foto != '')
                                        <img src="{{ asset('storage/images/docente/' . $docente->foto) }}" alt="table-user" class="me-2 rounded-circle">
                                        <a href="javascript:void(0);" class="text-body fw-semibold">{{ $docente->nombre }}</a>
                                    @else
                                        <img src="{{ asset('storage/images/default.png') }}" alt="table-user" class="me-2 rounded-circle">
                                        <a href="javascript:void(0);" class="text-body fw-semibold">{{ $docente->nombre }}</a>
                                    @endif
                                </td>
                                <td>
                                    {{ $docente->telefono }}
                                </td>
                                <td>
                                    {{ $docente->email }}
                                </td>
                                <td>
                                    {{ $docente->direccion }}
                                </td>
                                <td>
                                    {{ $docente->fecha_creacion }}
                                </td>
                                <td>
                                    <input type="checkbox" 
                                        id="switch{{ $docente->id_docente }}" 
                                        data-docente-id="{{ $docente->id_docente }}" 
                                        data-estado="{{ $docente->estado }}"
                                        {{ $docente->estado == 'activo' ? 'checked' : '' }}
                                        class="estado-switch"
                                        data-switch="info" 
                                    />
                                    <label for="switch{{ $docente->id_docente }}" data-on-label="On" data-off-label="Off"></label>
                                </td>

                                <td>
                                    <a href="{{ route('teacher.view', $docente->id_docente) }}" class="action-icon"> <i class="mdi mdi-eye"></i></a>

                                    <a href="{{ route('teacher.edit', $docente->id_docente) }}" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                    
                                    <a href="javascript:void(0);" class="action-icon delete-button" data-docente-id="{{ $docente->id_docente }}">
                                        <i class="mdi mdi-delete"></i>
                                    </a>
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

<script src="{{asset('js/pages/docentes/index.js')}}"></script>

@endsection