  <!--Modal Ajout -->
  <div id="ajoutEntrepriseModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myEntrepriseModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myEntrepriseModalLabel">Ajout d'une Entreprise</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('entreprises.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    @if($errors->any() && session()->has('operation') && session()->get('operation') =="store")
                        @foreach($errors->all() as $error)
                            <div class="col-6-auto">
                                <div class="alert alert-danger" role="alert">{{ $error }}</div>
                            </div>
                        @endforeach
                    @endif
                    
                    <div class="form-group row align-items-center">
                        <label class="col-md-3 col-form-label">Acronyme</label>
                        <div class="col-md-9">
                            <input class="form-control" type="text" name="acronyme" >
                        </div>
                    </div>
                  
                    <div class="form-group row align-items-center">
                        <label class="col-md-3 col-form-label">Adresse</label>
                        <div class="col-md-9">
                          <textarea name="adresse" cols="10" rows="3" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="form-group row align-items-center">
                        <label class="col-md-3 col-form-label">tel</label>
                        <div class="col-md-9">
                            <input class="form-control" type="phone" name="tel" >
                        </div>
                    </div>
                    <div class="form-group row align-items-center">
                        <label class="col-md-3 col-form-label">Ville</label>
                        <div class="col-md-9">
                            <input class="form-control" type="text" name="ville" >
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light waves-effect" data-dismiss="modal">Fermer</button>
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Ajouter</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
