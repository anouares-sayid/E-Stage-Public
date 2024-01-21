
<!--Modal modifier -->
<div id="editModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myModalLabel">Modifier le document</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" id="editForm" enctype="multipart/form-data" method="POST">
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
                        <label class="col-md-3 col-form-label">Type</label>
                        <div class="col-md-9">
                            <select id="editFileTypeSelect" class="form-control" name="fileType" id="fileType" >
                                <option value="rapport" selected>Rapport</option>
                                <option value="attestation" >Attestation</option>
                                <option value="ficheEvaluation" >Fiche d'evaluation</option>
                                <option value="presentation" >Presentation</option>
                               
                            </select>
                        </div>
                    </div>
                    <div class="form-group row align-items-center" id="editRapportVersionDiv">
                        <label class="col-md-3 col-form-label">Type</label>
                        <div class="col-md-9">
                            <select class="form-control" name="rapportVersion" id="rapportVersion">
                                <option value="firstV" selected>Premier version</option>
                                <option value="finalV" >Version final</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row align-items-center">
                        <label for="docFile" class="col-md-3 col-form-label">Fichier</label>
                        <div class="col-md-9">
                            <div class="custom-file">
                                <input type="hidden" name="type" value=''>
                                <input type="file" class="custom-file-input" name="docFile[]" id="docFile"
                                accept="application/pdf"  onchange="getName(event,this)">
                                <label class="custom-file-label " style="white-space: nowrap; 
                                width: 100%; 
                                overflow: hidden;
                                display: inline-block;
                                text-overflow: ellipsis; " for="docFile">Choose file</label>
                            </div>
                            <span class="text-muted">only PDF</span>
                        </div>
                    </div>
                    <div class="form-group row align-items-center">
                        <label class="col-md-3 col-form-label">Commentaire</label>
                        <div class="col-md-9">
                          <textarea id="commentaire" name="commentaire" cols="3" rows="5" class="form-control"></textarea>
                        </div>
                    </div>
                  
                    <div class="form-group row align-items-center">
                        <label class="col-md-3 col-form-label">Stage</label>
                        <div class="col-md-9">
                            <select class="form-control" name="stage_id" id="stage_id">
                                <option selected >--- Stage ---</option>
                                @foreach($stages as $stage)
                                <option id="stage_{{$stage->id}}" value="{{$stage->id}}" >{{$stage->sujet}} - {{$stage->entreprise->acronyme}}</option>
                                @endforeach
                            </select>
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