@extends('layouts.admin')

@section('contenido')

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">EduWebPro</a></li>
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Padres</a></li>
                    <li class="breadcrumb-item active">Editar</li>
                </ol>
            </div>
            <h4 class="page-title">Editar Padre</h4>
        </div>
    </div>
</div>     
<!-- end page title --> 

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('parents.update', $padre->id_padre) }}" method="POST" enctype="multipart/form-data" id="updateForm">
                    @csrf
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="mb-3">
                                <label for="name_tutor_edit" class="form-label">Nombre del tutor <span class="text-danger">*</span></label>
                                <input type="text" name="name_tutor_edit" id="name_tutor_edit" class="form-control" placeholder="" value="{{$padre->nombre_tutor}}" required>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="mb-3">
                                <label for="apellidos_tutor_edit" class="form-label">Apellidos del tutor <span class="text-danger">*</span></label>
                                <input type="text" name="apellidos_tutor_edit" id="apellidos_tutor_edit" class="form-control" placeholder="" value="{{$padre->apellidos_tutor}}" required>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="mb-3">
                                <label for="name_padre_edit" class="form-label">Nombre del padre</label>
                                <input type="text" name="name_padre_edit" id="name_padre_edit" class="form-control" placeholder="" value="{{$padre->nombre_padre}}" required>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="mb-3">
                                <label for="name_madre_edit" class="form-label">Nombre de la madre</label>
                                <input type="text" name="name_madre_edit" id="name_madre_edit" class="form-control" placeholder="" value="{{$padre->nombre_madre}}" required>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="mb-3">
                                <label for="profesion_padre_edit" class="form-label">Profesión del padre</label>
                                <input type="text" name="profesion_padre_edit" id="profesion_padre_edit" class="form-control" placeholder="" value="{{$padre->profesion_padre}}" required>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="mb-3">
                                <label for="profesion_madre_edit" class="form-label">Profesión de la madre</label>
                                <input type="text" name="profesion_madre_edit" id="profesion_madre_edit" class="form-control" placeholder="" value="{{$padre->profesion_madre}}" required>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="mb-3">
                                <label for="email_edit" class="form-label">Correo Electrónico</label>
                                <input type="email" name="email_edit" id="email_edit" class="form-control" placeholder="" value="{{$padre->email}}" required>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="mb-3">
                                <label for="telefono_edit" class="form-label">Telefono</label>
                                <input type="text" name="telefono_edit" id="telefono_edit" class="form-control" placeholder="" value="{{$padre->telefono}}" required>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="mb-3">
                                <label for="direccion_edit" class="form-label">Dirección</label>
                                <input type="text" name="direccion_edit" id="direccion_edit" class="form-control" placeholder="" value="{{$padre->direccion}}" required>
                            </div>
                        </div>

                        <div class="col-xl-6">
                            <div class="mb-3">
                                <label for="dni" class="form-label">Dni <span class="text-danger">*</span></label>
                                <input type="number" name="dni" id="dni" class="form-control" placeholder="" value="{{$padre->dni}}" required>
                            </div>
                        </div>

                        <div class="col-xl-6">
                            <div class="mb-3">
                                <label for="password_edit" class="form-label">Contraseña </label>
                                <input type="password" name="password_edit" id="password_edit" class="form-control" placeholder="">
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-4 col-sm-4 col-xs-6 mb-3">
                            <label for="example-fileinput-editar" class="form-label">Foto Perfil</label>
                            <input type="file" id="example-fileinput-editar" name="imagen_editar" class="form-control" accept="image/*">
                        </div>

                        <!-- file preview template -->
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 mb-12">
                            <div class="mb-3">
                                <div id="uploadPreviewTemplate-editar">
                                    <div class="card mt-1 mb-0 shadow-none border">
                                        <div class="p-2">
                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    @if($padre->imagen === "")
                                                        <img src="{{asset('storage/images/default.png')}}" id="image-preview-editar" class="avatar-sm rounded bg-light" alt="">
                                                    @else 
                                                        <img src="{{ asset('storage/images/' . $padre->imagen) }}" id="image-preview-editar" class="avatar-sm rounded bg-light" alt="">
                                                    @endif
                                                </div>
                                                <div class="col ps-0 peso-name">

                                                    @if($padre->imagen === "")
                                                        <a href="javascript:void(0);" class="text-muted fw-bold" data-dz-name>{{ $padre->nombre_tutor }}</a>
                                                        <p class="mb-0" data-dz-size>12.4 KB</p>
                                                    @else 
                                                        <a href="javascript:void(0);" class="text-muted fw-bold" data-dz-name>{{ $padre->imagen }}</a>
                                                        <p class="mb-0" data-dz-size></p>
                                                    @endif

                                                    
                                                </div>
                                                <div class="col-auto">
                                                    <!-- Button -->
                                                    <a href="" class="btn btn-link btn-lg text-muted" data-dz-remove data-remove-button-edit>
                                                        <i class="dripicons-cross"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- file preview template -->
                        

                        <div class="mb-3 text-center">
                            <button type="submit" class="btn btn-primary mx-1" form="updateForm"><i class="mdi mdi-content-save"></i> Guardar</button>
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
    <script src="{{asset('js/pages/padres/edit.padres.js')}}"></script>
@endsection