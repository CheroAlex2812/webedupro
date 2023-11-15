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
                    <li class="breadcrumb-item active">Perfil</li>
                </ol>
            </div>
            <h4 class="page-title">Perfil</h4>
        </div>
    </div>
</div>     
<!-- end page title --> 

<div class="row">
    <div class="col-xl-4 col-lg-5">
        <div class="card text-center">
            <div class="card-body">
                @if($parent->imagen != '')
                    <img src="{{asset('storage/images/' . $parent->imagen)}}" class="rounded-circle avatar-lg img-thumbnail" alt="profile-image">
                @else
                    <img src="{{asset('storage/images/default.png')}}" class="rounded-circle avatar-lg img-thumbnail" alt="profile-image">
                @endif

                <h4 class="mb-0 mt-2">{{$parent->nombre_tutor}}</h4>
                <p class="text-muted font-14">Tutor</p>

                <button type="button" class="btn btn-success btn-sm mb-2">Follow</button>
                <button type="button" class="btn btn-danger btn-sm mb-2">Message</button>

                <div class="text-start mt-3">
                    
                    <p class="text-muted mb-2 font-13"><strong>Nombre del Tutor :</strong> <span class="ms-2">{{$parent->nombre_tutor}}</span></p>

                    <p class="text-muted mb-2 font-13"><strong>Apellidos del Tutor :</strong> <span class="ms-2">{{$parent->apellidos_tutor}}</span></p>

                    <p class="text-muted mb-2 font-13"><strong>Teléfono :</strong><span class="ms-2">{{$parent->telefono}}</span></p>

                    <p class="text-muted mb-2 font-13"><strong>Correo :</strong> <span class="ms-2 ">{{$parent->email}}</span></p>

                    <p class="text-muted mb-1 font-13"><strong>Dirección :</strong> <span class="ms-2">{{$parent->direccion}}</span></p>
                </div>

                
            </div> <!-- end card-body -->
        </div> <!-- end card -->


    </div> <!-- end col-->

    <div class="col-xl-8 col-lg-7">
        <div class="card">
            <div class="card-body">
                <ul class="nav nav-pills bg-nav-pills nav-justified mb-3">
                    <li class="nav-item">
                        <a href="#aboutme" data-bs-toggle="tab" aria-expanded="false" class="nav-link rounded-0">
                            Perfil
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#timeline" data-bs-toggle="tab" aria-expanded="true" class="nav-link rounded-0 active">
                            Estudiantes
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#settings" data-bs-toggle="tab" aria-expanded="false" class="nav-link rounded-0">
                            Documentos
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane" id="aboutme">

                        <h5 class="text-uppercase"><i class="mdi mdi-briefcase me-1"></i>
                            Datos</h5>

                            <div class="mt-4">
                                <div class="row">
                                    <div class="col-md-4">
                                        <h6 class="font-14">Nombre del Padre:</h6>
                                        <p class="text-sm lh-150">{{$parent->nombre_padre}}</p>
                                    </div>
                                    <div class="col-md-4">
                                        <h6 class="font-14">Nombre de la Madre:</h6>
                                        <p class="text-sm lh-150">{{$parent->nombre_madre}}</p>
                                    </div>
                                    <div class="col-md-4">
                                        <h6 class="font-14">Direccion:</h6>
                                        <p class="text-sm lh-150">{{$parent->direccion}}</p>
                                    </div>

                                    <div class="col-md-4">
                                        <h6 class="font-14">Profesión del Padre:</h6>
                                        <p class="text-sm lh-150">{{$parent->profesion_padre}}</p>
                                    </div>
                                    <div class="col-md-4">
                                        <h6 class="font-14">Profesión de la Madre:</h6>
                                        <p class="text-sm lh-150">{{$parent->profesion_madre}}</p>
                                    </div>
                                    <div class="col-md-4">
                                        <h6 class="font-14">Telefono:</h6>
                                        <p class="text-sm lh-150">{{$parent->telefono}}</p>
                                    </div>

                                    <div class="col-md-4">
                                        <h6 class="font-14">Correo Electrónico:</h6>
                                        <p class="text-sm lh-150">{{$parent->email}}</p>
                                    </div>

                                    <div class="col-md-4">
                                        <h6 class="font-14">Dni:</h6>
                                        <p class="text-sm lh-150">{{$parent->dni}}</p>
                                    </div>
                                </div>
                            </div>
                        <!-- end timeline -->

                    </div> <!-- end tab-pane -->
                    <!-- end about me section content -->

                    <div class="tab-pane show active" id="timeline">


                        <h5 class="mb-3 mt-4 text-uppercase"><i class="mdi mdi-cards-variant me-1"></i>
                            Estudiantes</h5>
                        <div class="table-responsive">
                            <table class="table table-borderless table-nowrap mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>#</th>
                                        <th>Nombres</th>
                                        <th>Grado</th>
                                        <th>Sección</th>
                                        <th>Estado</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td><img src="{{asset('images/users/avatar-2.jpg')}}" alt="table-user" class="me-2 rounded-circle" height="24"> Halette Boivin</td>
                                        <td>Primero</td>
                                        <td>Unica</td>
                                        <td><span class="badge badge-info-lighten">Activo</span></td>
                                    </tr>
                                    

                                </tbody>
                            </table>
                        </div>



                    </div>
                    <!-- end timeline content-->

                    <div class="tab-pane" id="settings">
                        <div class="row">
                            <div class="col-12">
                                
                                @if ($parent->estado == 'activo')
                                    <div class="col-md-4">
                                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#upload-modal"><i class="mdi mdi-plus"></i> Agregar Documento </button>
                                    </div>
                                @else
                                    <div class="alert alert-danger" role="alert">
                                        <i class="dripicons-wrong me-2"></i> Para agregar un documento, el <strong>Padre de Familia</strong> debe estar activo!
                                    </div>
                                @endif
                                
                            </div>
                        </div>

                        @include('padres.uploaddoc')
                        
                        @foreach ($documentosPorFecha as $fecha => $documentos)

                        <h5 class="mt-4 mb-2 font-16">{{ $fecha }}</h5>

                        @foreach ($documentos as $documento)
                            <div class="card mb-2 shadow-none border">
                                <div class="p-1">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            @php
                                            $extension = pathinfo($documento->archivo, PATHINFO_EXTENSION);
                                            $imagePath = 'images/file/';

                                            switch ($extension) {
                                                case 'pdf':
                                                    $imagePath .= 'pdf.png';
                                                    break;
                                                case 'doc':
                                                    $imagePath .= 'doc.png';
                                                    break;
                                                case 'docx':
                                                    $imagePath .= 'doc.png';
                                                    break;
                                                case 'xlsx':
                                                    $imagePath .= 'xlsx.png';
                                                    break;
                                                default:
                                                    $imagePath .= 'default.png'; // Imagen predeterminada para otros formatos
                                            }
                                            @endphp
                                            <img src="{{ asset($imagePath) }}" class="avatar-sm rounded" alt="file-image" />
                                        </div>
                                        <div class="col ps-0">
                                            <a href="javascript:void(0);" class="text-muted fw-bold">{{$documento->archivo}}</a>
                                            <p class="mb-0">{{ $documento->tamañoMB }} MB</p>
                                        </div>
                                        <div class="col-auto" id="tooltip-container9">
                                            
                                            <a href="{{ route('download.document', ['archivo' => $documento->archivo]) }}" class="btn btn-link text-muted btn-lg p-0">
                                                <i class='uil uil-cloud-download'></i>
                                            </a>
                                            
                                            <a href="{{ route('delete.document', ['id' => $documento->id_doc]) }}" class="btn btn-link text-danger btn-lg p-0">
                                                <i class='uil uil-multiply'></i>
                                            </a>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        @endforeach
                                                <!-- end attachments -->
                    </div>
                    <!-- end settings content-->

                </div> <!-- end tab-content -->
            </div> <!-- end card body -->
        </div> <!-- end card -->
    </div> <!-- end col -->
</div>
<!-- end row-->

@endsection

@section('scripts')
    <script src="{{asset('js/pages/padres/view.padres.js')}}"></script>
@endsection