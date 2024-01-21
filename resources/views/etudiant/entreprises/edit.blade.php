
<!--Modal modifier -->
<div id="editModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myModalLabel">Modifier l'Entreprise</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" id="editForm" method="POST">
                @method('PUT')
                @csrf
                <div class="modal-body">
                    @if($errors->any() && session()->has('operation') && session()->get('operation') =="update")
                        @foreach($errors->all() as $error)
                            <div class="col-6-auto">
                                <div class="alert alert-danger" role="alert">{{ $error }}</div>
                            </div>
                        @endforeach
                    @endif
                       
                    <div class="form-group row align-items-center">
                        <label class="col-md-3 col-form-label">Acronyme</label>
                        <div class="col-md-9">
                            <input class="form-control" type="text" name="acronyme" id="acronyme">
                        </div>
                    </div>
                  
                    <div class="form-group row align-items-center">
                        <label class="col-md-3 col-form-label">Adresse</label>
                        <div class="col-md-9">
                          <textarea name="adresse" id="adresse" cols="10" rows="3" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="form-group row align-items-center">
                        <label class="col-md-3 col-form-label">tel</label>
                        <div class="col-md-9">
                            <input class="form-control" type="phone" name="tel" id="tel">
                        </div>
                    </div>
                    <div class="form-group row align-items-center">
                        <label class="col-md-3 col-form-label">Ville</label>
                        <div class="col-md-9">
                            <input class="form-control" type="text" name="ville" id="ville">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light waves-effect" data-dismiss="modal">Fermer</button>
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Modifier</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>