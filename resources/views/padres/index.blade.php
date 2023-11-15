@extends('layouts.admin')

@section('contenido')

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">EduWebPro</a></li>
                    <li class="breadcrumb-item active">Padres</li>
                </ol>
            </div>
            <h4 class="page-title">Padres</h4>
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
                        <a href="{{ route('parents.create') }}" class="btn btn-danger mb-2"><i class="mdi mdi-plus-circle me-2"></i> Agregar Padre</a>
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
                    <table class="table table-centered table-striped nowrap w-100" id="parents-datatable">
                        <thead>
                            <tr>
                                <th style="width: 20px;">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="customCheck1">
                                        <label class="form-check-label" for="customCheck1">&nbsp;</label>
                                    </div>
                                </th>
                                <th>Padres</th>
                                <th>Telefono</th>
                                <th>Correo Electrónico</th>
                                <th>Dirección</th>
                                <th>Fecha Creación</th>
                                <th>Estado</th>
                                <th>Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($padres as $pr)
                            <tr>
                                <td>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="customCheck{{ $pr->id_padre }}">
                                        <label class="form-check-label" for="customCheck{{ $pr->id_padre }}">&nbsp;</label>
                                    </div>
                                </td>
                                <td class="table-user">
                                    @if($pr->imagen != '')
                                        <img src="{{ asset('storage/images/' . $pr->imagen) }}" alt="table-user" class="me-2 rounded-circle">
                                        <a href="javascript:void(0);" class="text-body fw-semibold">{{ $pr->nombre_tutor }}</a>
                                    @else
                                        <img src="{{ asset('storage/images/default.png') }}" alt="table-user" class="me-2 rounded-circle">
                                        <a href="javascript:void(0);" class="text-body fw-semibold">{{ $pr->nombre_tutor }}</a>
                                    @endif
                                </td>
                                <td>
                                    {{ $pr->telefono }}
                                </td>
                                <td>
                                    {{ $pr->email }}
                                </td>
                                <td>
                                    {{ $pr->direccion }}
                                </td>
                                <td>
                                    {{ $pr->fecha_creacion }}
                                </td>
                                <td>
                                    <input type="checkbox" 
                                        id="switch{{ $pr->id_padre }}" 
                                        data-padre-id="{{ $pr->id_padre }}" 
                                        data-estado="{{ $pr->estado }}"
                                        {{ $pr->estado == 'activo' ? 'checked' : '' }}
                                        class="estado-switch"
                                        data-switch="info" 
                                    />
                                    <label for="switch{{ $pr->id_padre }}" data-on-label="On" data-off-label="Off"></label>
                                </td>

                                <td>
                                    <a href="{{ route('parents.view', $pr->id_padre) }}" class="action-icon"> <i class="mdi mdi-eye"></i></a>

                                    <a href="{{ route('parents.edit', $pr->id_padre) }}" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                    
                                    

                                    <a href="javascript:void(0);" class="action-icon delete-button" data-padre-id="{{ $pr->id_padre }}">
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

<script src="{{asset('js/pages/padres/index.padres.js')}}"></script>

@endsection