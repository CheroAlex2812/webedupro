<div id="delete-padre-{{ $pr->id_padre }}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-body p-4">
                <form method="POST" action="{{ route('parents.destroy', $pr->id_padre) }}">
                    @csrf
                    @method('DELETE')
                    <div class="text-center">
                        <i class="dripicons-information h1 text-info"></i>
                        <h4 class="mt-2">Eliminar Padre</h4>
                        <p class="mt-3 text-info"><strong>{{ $pr->nombre_tutor }}</strong></p>
                        <p class="mt-3">¿Estás seguro de que deseas eliminar este padre? Esta acción no se puede deshacer.</p>
                        <button type="submit" class="btn btn-info my-2" data-bs-dismiss="modal">Continuar</button>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->