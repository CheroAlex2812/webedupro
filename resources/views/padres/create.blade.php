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
                    <li class="breadcrumb-item active">Agregar</li>
                </ol>
            </div>
            <h4 class="page-title">Agregar Padre</h4>
        </div>
    </div>
</div>     
<!-- end page title --> 

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('parents.guardar') }}" method="POST" enctype="multipart/form-data" id="create_padres">
                    @csrf
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="mb-3">
                                <label for="name_tutor" class="form-label">Nombre del tutor <span class="text-danger">*</span></label>
                                <input type="text" name="name_tutor" id="name_tutor" class="form-control" placeholder="Ingrese nombre tutor" required>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="mb-3">
                                <label for="apellidos_tutor" class="form-label">Apellidos del tutor <span class="text-danger">*</span></label>
                                <input type="text" name="apellidos_tutor" id="apellidos_tutor" class="form-control" placeholder="Ingrese apellidos tutor" required>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="mb-3">
                                <label for="name_padre" class="form-label">Nombre del padre</label>
                                <input type="text" name="name_padre" id="name_padre" class="form-control" placeholder="Ingrese nombre padre" required>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="mb-3">
                                <label for="name_madre" class="form-label">Nombre de la madre</label>
                                <input type="text" name="name_madre" id="name_madre" class="form-control" placeholder="Ingrese nombre madre" required>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="mb-3">
                                <label for="profesion_padre" class="form-label">Profesión del padre</label>
                                <input type="text" name="profesion_padre" id="profesion_padre" class="form-control" placeholder="Ingrese profesión padre" required>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="mb-3">
                                <label for="profesion_madre" class="form-label">Profesión de la madre</label>
                                <input type="text" name="profesion_madre" id="profesion_madre" class="form-control" placeholder="Ingrese profesión madre" required>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="mb-3">
                                <label for="email" class="form-label">Correo Electrónico</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="Ingrese correo electrónico" required>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="mb-3">
                                <label for="telefono" class="form-label">Teléfono</label>
                                <input type="text" name="telefono" id="telefono" class="form-control" placeholder="Ingrese teléfono" required>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="mb-3">
                                <label for="direccion" class="form-label">Dirección</label>
                                <input type="text" name="direccion" id="direccion" class="form-control" placeholder="Ingrese dirección" required>
                            </div>
                        </div>

                        <div class="col-xl-6">
                            <div class="mb-3">
                                <label for="dni" class="form-label">Dni <span class="text-danger">*</span></label>
                                <input type="number" name="dni" id="dni" class="form-control" placeholder="Ingrese Dni" required>
                            </div>
                        </div>

                        <div class="col-xl-6">
                            <div class="mb-3">
                                <label for="password" class="form-label">Contraseña <span class="text-danger">*</span></label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="Ingrese Contraseña" required>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-4 col-sm-4 col-xs-6 mb-3">
                            <div class="mb-3">
                                <label for="example-fileinput" class="form-label">Foto Perfil</label>
                                <input type="file" id="example-fileinput" name="imagen" class="form-control" accept="image/*">
                            </div>
                        </div>
                        <!-- file preview template -->
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 mb-12">
                            <div class="mb-3">
                                <div id="uploadPreviewTemplate" style="display: none;">
                                    <div class="card mt-1 mb-0 shadow-none border">
                                        <div class="p-2">
                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <img id="image-preview" src="#" class="avatar-sm rounded bg-light" alt="">
                                                </div>
                                                <div class="col ps-0">
                                                    <a href="javascript:void(0);" class="text-muted fw-bold" data-dz-name></a>
                                                    <p class="mb-0" data-dz-size></p>
                                                </div>
                                                <div class="col-auto">
                                                    <!-- Button -->
                                                    <a href="" class="btn btn-link btn-lg text-muted" data-dz-remove data-remove-button-create>
                                                        <i class="dripicons-cross"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
    <script src="{{asset('js/pages/padres/create.padres.js')}}"></script>
@endsection