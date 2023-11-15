@extends('layouts.admin')

@section('contenido')

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">EduWebPro</a></li>
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Docentes</a></li>
                    <li class="breadcrumb-item active">Agregar</li>
                </ol>
            </div>
            <h4 class="page-title">Agregar Docente</h4>
        </div>
    </div>
</div>     
<!-- end page title --> 

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('teacher.guardar') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="mb-3">
                                <label for="name_docente" class="form-label">Nombre <span class="text-danger">*</span></label>
                                <input type="text" name="name_docente" id="name_docente" class="form-control" placeholder="Ingrese Nombre" required>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="mb-3">
                                <label for="apellidos_docente" class="form-label">Apellidos <span class="text-danger">*</span></label>
                                <input type="text" name="apellidos_docente" id="apellidos_docente" class="form-control" placeholder="Ingrese Apellido" required>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="mb-3">
                                <label for="designacion" class="form-label">Designación <span class="text-danger">*</span></label>
                                <input type="text" name="designacion" id="designacion" class="form-control" placeholder="Ingrese Designación" required>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="mb-3">
                                <label for="fecha_nacimiento" class="form-label">Fecha de Nacimiento <span class="text-danger">*</span></label>
                                <input type="text" name="fecha_nacimiento" id="fecha_nacimiento" class="form-control" placeholder="Ingrese Fecha Nacimiento" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="mb-3">
                                <label for="genero" class="form-label">Género</label>
                                <!-- Single Select -->
                                <select class="form-select mb-3" name="genero">
                                    <option selected>Seleccionar</option>
                                    <option value="Masculino">Masculino</option>
                                    <option value="Femenino">Femenino</option>
                                </select> 
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="mb-3">
                                <label for="religion" class="form-label">Religión</label>
                                <input type="text" name="religion" id="religion" class="form-control" placeholder="Ingrese Religión" required>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="mb-3">
                                <label for="email" class="form-label">Correo Electrónico</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="Ingrese Correo Electrónico" required>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="mb-3">
                                <label for="telefono" class="form-label">Teléfono</label>
                                <input type="text" name="telefono" id="telefono" class="form-control" placeholder="Ingrese Teléfono" required>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="mb-3">
                                <label for="direccion" class="form-label">Dirección</label>
                                <input type="text" name="direccion" id="direccion" class="form-control" placeholder="Ingrese Dirección" required>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="mb-3">
                                <label for="fecha_ingreso" class="form-label">Fecha de Ingreso</label>
                                <input type="text" name="fecha_ingreso" id="fecha_ingreso" class="form-control" placeholder="Ingrese Fecha Ingreso" autocomplete="off" required>
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
    <script src="{{asset('js/pages/docentes/create.js')}}"></script>
@endsection