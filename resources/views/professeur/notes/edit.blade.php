
<!--Modal modifier -->
<div id="editModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myModalLabel">Modifier la note</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" id="editForm" method="POST">
                @csrf 
                @method('PUT')
                <div class="modal-body">
                    @if($errors->any() && session()->has('operation') && session()->get('operation') =="update")
                        @foreach($errors->all() as $error)
                            <div class="col-6-auto">
                                <div class="alert alert-danger" role="alert">{{ $error }}</div>
                            </div>
                        @endforeach
                    @endif
                     <input type="hidden" name="operation" value="noter">
                    <div class="form-group row align-items-center">
                        <label class="col-md-3 col-form-label">Stage Id</label>
                        <div class="col-md-9">
                            <input class="form-control" type="text" disabled id="stage_id">
                        </div>
                    </div>
                    <div class="form-group row align-items-center">
                        <label class="col-md-3 col-form-label">Note</label>
                        <div class="col-md-9">
                            <input class="form-control" type="number" step=0.01 name="note" id="note_stage">
                        </div>
                    </div>
                  
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light waves-effect" data-dismiss="modal">Fermer</button>
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Noter</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>