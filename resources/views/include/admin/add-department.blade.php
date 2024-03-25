<div>
    <div wire:ignore.self class="modal fade" id="addTagModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addTagModal">Ajouter le departement</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form  class="mt-1 mt-sm-2" wire:submit.prevent="saveDepartment()">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="control-label"> Nom</label>
                                    <input type="text" wire:model="name" class="form-control"
                                        placeholder="saisir le nom du department" />
                                    @error('name')
                                        <span class="text-danger">{{ $message }} </span>
                                    @enderror
                                </div>
                            </div>

                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i
                                    class="fa fa-times"></i></button>
                            <button type="submit" class="btn btn-success"> <i class="fa fa-save"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scriptEventModal')
    <script>
        window.addEventListener('close-modal', event => {
            $('#addTagModal').modal('hide');
        });
    </script>
@endpush
