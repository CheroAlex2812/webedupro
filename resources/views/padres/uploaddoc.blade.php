<div id="upload-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="standard-modalLabel">Cargar Documento</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>

            <form class="ps-3 pe-3" id="DocumentPadres" method="POST" action="{{ route('parents.documento') }}" enctype="multipart/form-data">

                @csrf

                <div class="modal-body">

                    <input type="hidden" name="id_padre" value="{{ $parent->id_padre }}">

                    <div class="mb-3">
                        <label for="title" class="form-label">Titulo <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="title" id="title" required placeholder="">
                    </div>

                    <div class="col-lg-12 col-md-4 col-sm-4 col-xs-6 mb-3">
                        <div class="mb-3">
                            <label for="example-fileinput" class="form-label">Archivo <span class="text-danger">*</span></label>
                            <input type="file" id="example-fileinput" name="archivo" class="form-control">
                        </div>
                    </div>
                    <!-- file preview template -->
                    <div class="col-lg-12 col-md-6 col-sm-12 col-xs-12 mb-12">
                        <div class="mb-3">
                            <div id="uploadPreviewTemplate" style="display: none;">
                                <div class="card mt-1 mb-0 shadow-none border">
                                    <div class="p-2">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <i class="fas fa-file" id="file-icon"></i>
                                            </div>
                                            <div class="col ps-0">
                                                <a href="javascript:void(0);" class="text-muted fw-bold" data-dz-name></a>
                                                <p class="mb-0" data-dz-size></p>
                                                <p class="mb-0" data-dz-extension></p>
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

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" form="DocumentPadres" id="guardar_documento" class="btn btn-primary">Subir</button>
                </div>

            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->