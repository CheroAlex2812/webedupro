@extends('layouts.admin')

@section('contenido')

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">EduWebPro</a></li>
                    <li class="breadcrumb-item active">Estudiantes</li>
                </ol>
            </div>
            <h4 class="page-title">Estudiantes</h4>
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
                        <a href="javascript:void(0);" class="btn btn-danger mb-2"><i class="mdi mdi-plus-circle me-2"></i> Agregar Estudiante</a>
                    </div>
                    <div class="col-sm-8">
                        <div class="text-sm-end">
                            <button type="button" class="btn btn-success mb-2 me-1"><i class="mdi mdi-cog"></i></button>
                            <button type="button" class="btn btn-light mb-2 me-1">Import</button>
                            <button type="button" class="btn btn-light mb-2">Export</button>
                        </div>
                    </div><!-- end col-->
                </div>

                <div class="table-responsive">
                    <table class="table table-centered table-striped dt-responsive nowrap w-100" id="products-datatable">
                        <thead>
                            <tr>
                                <th style="width: 20px;">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="customCheck1">
                                        <label class="form-check-label" for="customCheck1">&nbsp;</label>
                                    </div>
                                </th>
                                <th>Estudiante</th>
                                <th>Telefono</th>
                                <th>Correo Electrónico</th>
                                <th>Lugar</th>
                                <th>Fecha Creación</th>
                                <th>Estado</th>
                                <th style="width: 75px;">Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="customCheck2">
                                        <label class="form-check-label" for="customCheck2">&nbsp;</label>
                                    </div>
                                </td>
                                <td class="table-user">
                                    <img src="{{asset('images/users/avatar-4.jpg')}}" alt="table-user" class="me-2 rounded-circle">
                                    <a href="javascript:void(0);" class="text-body fw-semibold">Paul J. Friend</a>
                                </td>
                                <td>
                                    937-330-1634
                                </td>
                                <td>
                                    pauljfrnd@jourrapide.com
                                </td>
                                <td>
                                    New York
                                </td>
                                <td>
                                    07/07/2018
                                </td>
                                <td>
                                    <span class="badge badge-success-lighten">Active</span>
                                </td>

                                <td>
                                    <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                    <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-delete"></i></a>
                                </td>
                            </tr>
                            
                            
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

<script src="{{asset('js/pages/pages.estudiante.js')}}"></script>

@endsection