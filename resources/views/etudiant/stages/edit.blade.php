
<!--Modal modifier -->
<div id="editModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myModalLabel">Modifier ce stage</h5>
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
                     
                    <div class="form-group row align-items-center">
                        <label class="col-md-3 col-form-label">Sujet</label>
                        <div class="col-md-9">
                            <input class="form-control" type="text" name="sujet" id="sujet">
                        </div>
                    </div>
                    <div class="form-group row align-items-center">
                        <label class="col-md-3 col-form-label">Description</label>
                        <div class="col-md-9">
                          <textarea name="description" id="description" cols="30" rows="10" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="form-group row align-items-center">
                        <label class="col-md-3 col-form-label">Etudiants</label>
                        <div class="col-md-9">
                            <select class="select2 form-control select2-multiple" multiple="multiple" data-placeholder="Choose ..." name="etudiant_id[]" id="etudiant">
                                <option></option>
                                @foreach($etudiants as $etud)
                                    <option id="etudiant_{{$etud->id}}" value="{{$etud->id}}" >{{ $etud->user->firstname}} {{ $etud->user->lastname}} - {{ $etud->apogee}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group row align-items-center">
                        <label class="col-3 col-form-label">Entreprise</label>
                        <div class="col-7">
                            <select class="form-control" name="entreprise_id" id="entreprise_id">
                                <option selected >--- Entreprise ---</option>
                                @foreach($entreprises as $entreprise)
                                <option id="entreprise_{{$entreprise->id}}" value="{{$entreprise->id}}" >{{$entreprise->acronyme}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-2" >
                            <button class="btn btn-primary waves-effect waves-light ajoutEntrepriseButton"  data-toggle="modal"><i class="mdi mdi-plus"></i></button>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12 text-center">Encadrant Professionnel</label>
                      
                    <div class="form-group row align-items-center">
                        <label class="col-md-3 col-form-label">Nom</label>
                        <div class="col-md-9">
                            <input class="form-control" type="text" name="encadrant_prof_nom" id="encadrant_prof_nom">
                        </div>
                    </div>
                    <div class="form-group row align-items-center">
                        <label class="col-md-3 col-form-label">Prenom</label>
                        <div class="col-md-9">
                            <input class="form-control" type="text" name="encadrant_prof_prenom" id="encadrant_prof_prenom">
                        </div>
                    </div>
                    <div class="form-group row align-items-center">
                        <label class="col-md-3 col-form-label">Tel</label>
                        <div class="col-md-9">
                            <input class="form-control" type="phone" name="encadrant_prof_tel" id="encadrant_prof_tel">
                        </div>
                    </div>
                    <div class="form-group row align-items-center">
                        <label class="col-md-3 col-form-label">Email</label>
                        <div class="col-md-9">
                            <input class="form-control" type="email" name="encadrant_prof_email" id="encadrant_prof_email">
                        </div>
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