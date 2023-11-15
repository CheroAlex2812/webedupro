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
                    <li class="breadcrumb-item active">Editar</li>
                </ol>
            </div>
            <h4 class="page-title">Editar Docente</h4>
        </div>
    </div>
</div>     
<!-- end page title --> 

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('teacher.update', $docente->id_docente) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="mb-3">
                                <label for="name_docente_edit" class="form-label">Nombre <span class="text-danger">*</span></label>
                                <input type="text" name="name_docente_edit" id="name_docente_edit" class="form-control" placeholder="Ingrese Nombre" value="{{$docente->nombre}}" required>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="mb-3">
                                <label for="apellidos_docente_edit" class="form-label">Apellidos <span class="text-danger">*</span></label>
                                <input type="text" name="apellidos_docente_edit" id="apellidos_docente_edit" class="form-control" placeholder="Ingrese Apellido" value="{{$docente->apellidos}}" required>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="mb-3">
                                <label for="designacion_edit" class="form-label">Designación <span class="text-danger">*</span></label>
                                <input type="text" name="designacion_edit" id="designacion_edit" class="form-control" placeholder="Ingrese Designación" value="{{$docente->designacion}}" required>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="mb-3">
                                <label for="fecha_nacimiento_edit" class="form-label">Fecha de Nacimiento <span class="text-danger">*</span></label>
                                <input type="text" name="fecha_nacimiento_edit" id="fecha_nacimiento_edit" class="form-control" placeholder="Ingrese Fecha Nacimiento" value="{{$docente->fecha_nacimiento}}"autocomplete="off" required>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="mb-3">
                                <label for="genero_edit" class="form-label">Género</label>
                                <!-- Single Select -->
                                <select class="form-select mb-3" name="genero_edit">
                                    <option>Seleccionar</option>
                                    <option value="Masculino" {{ $docente->genero === 'Masculino' ? 'selected' : '' }}>Masculino</option>
                                    <option value="Femenino" {{ $docente->genero === 'Femenino' ? 'selected' : '' }}>Femenino</option>
                                </select> 
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="mb-3">
                                <label for="religion_edit" class="form-label">Religión</label>
                                <input type="text" name="religion_edit" id="religion_edit" class="form-control" placeholder="Ingrese Religión" value="{{$docente->religion}}" required>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="mb-3">
                                <label for="email_edit" class="form-label">Correo Electrónico</label>
                                <input type="email" name="email_edit" id="email_edit" class="form-control" placeholder="Ingrese Correo Electrónico" value="{{$docente->email}}" required>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="mb-3">
                                <label for="telefono_edit" class="form-label">Teléfono</label>
                                <input type="text" name="telefono_edit" id="telefono_edit" class="form-control" placeholder="Ingrese Teléfono" value="{{$docente->telefono}}" required>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="mb-3">
                                <label for="direccion_edit" class="form-label">Dirección</label>
                                <input type="text" name="direccion_edit" id="direccion_edit" class="form-control" placeholder="Ingrese Dirección" value="{{$docente->direccion}}" required>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="mb-3">
                                <label for="fecha_ingreso_edit" class="form-label">Fecha de Ingreso</label>
                                <input type="text" name="fecha_ingreso_edit" id="fecha_ingreso_edit" class="form-control" placeholder="Ingrese Fecha Ingreso" value="{{$docente->fecha_ingreso}}" autocomplete="off" required>
                            </div>
                        </div>
                        

                        <div class="col-xl-6">
                            <div class="mb-3">
                                <label for="dni" class="form-label">Dni <span class="text-danger">*</span></label>
                                <input type="number" name="dni" id="dni" class="form-control" placeholder="Ingrese Dni" value="{{$docente->dni}}" required>
                            </div>
                        </div>

                        <div class="col-xl-6">
                            <div class="mb-3">
                                <label for="password_edit" class="form-label">Contraseña</label>
                                <input type="password" name="password_edit" id="password_edit" class="form-control" placeholder="Ingrese Contraseña">
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
                                                    @if($docente->foto === "")
                                                        <img src="{{asset('storage/images/default.png')}}" id="image-preview-editar" class="avatar-sm rounded bg-light" alt="">
                                                    @else 
                                                        <img src="{{ asset('storage/images/docente/' . $docente->foto) }}" id="image-preview-editar" class="avatar-sm rounded bg-light" alt="">
                                                    @endif
                                                </div>
                                                <div class="col ps-0 peso-name">

                                                    @if($docente->foto === "")
                                                        <a href="javascript:void(0);" class="text-muted fw-bold" data-dz-name>{{ $docente->nombre }}</a>
                                                        <p class="mb-0" data-dz-size>12.4 KB</p>
                                                    @else 
                                                        <a href="javascript:void(0);" class="text-muted fw-bold" data-dz-name>{{ $docente->foto }}</a>
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
    <script src="{{asset('js/pages/docentes/edit.js')}}"></script>
@endsection