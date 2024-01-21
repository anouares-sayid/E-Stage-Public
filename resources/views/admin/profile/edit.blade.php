 
 
<!--Modal modifier -->
<div id="editModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">  
                   <div class="modal-header">
                        <h5 class="modal-title mt-0">modifier votre profile</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('admins.update',$admin->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                    <div class="modal-body">
                            @if($errors->any())
                                @foreach($errors->all() as $error)
                                    <div class="col-6-auto">
                                        <div class="alert alert-danger" role="alert">{{ $error }}</div>
                                    </div>
                                @endforeach
                            @endif
                        <div class="row align-items-center">
                            <div class="col-lg-12">
                                
                            <div class="form-group auth-form-group-custom mb-4">
                                <i class="ri-lock-2-line auti-custom-input-icon"></i>
                                <label for="password">mots de passe</label>
                                <input type="password" id="password" class="form-control" name="password" placeholder="Enter your current password" >
                            </div>
                            </div>
                            <div class="col-lg-12">
                            <div class="form-group auth-form-group-custom mb-4">
                                <i class="ri-lock-2-line auti-custom-input-icon"></i>
                                <label for="password">New Password</label>
                                <input type="password" id="new-password" class="form-control @error('password') is-invalid @enderror" name="new_password" autocomplete="new-password" placeholder="Enter password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            </div>
                            
                            <div class="col-lg-12">
                            <div class="form-group auth-form-group-custom mb-4">
                                <i class="ri-lock-2-line auti-custom-input-icon"></i>
                                <label for="password-confirm">New Password Confirmation</label>
                                <input type="password" id="new-password-confirm" class="form-control" name="new_password_confirmation"  autocomplete="new-password" placeholder="Enter password">
                            </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group row align-items-center">
                                    <label for="profileImg" class="col-md-3 col-form-label">Photo de profile</label>
                                    <div class="col-md-9">
                                        <div class="custom-file">
                                            <input type="hidden" name="type"  value=''>
                                            <input type="file" class="custom-file-input" name="profileImg" id="profileImg" accept="image/*" onchange="getName(event,this)">
                                            <label class="custom-file-label" style="white-space: nowrap; 
                                            width: 100%; 
                                            overflow: hidden;
                                            display: inline-block;
                                            text-overflow: ellipsis;"for="profileImg">@if($admin->docFile ==null) Choose file @else {{$admin->docFile->path}}@endif</label>
                                        </div>
                                         <span class="text-muted" >only images</span>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- end row -->
                    </div>
        
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light waves-effect" data-dismiss="modal">Fermer</button>
                        <button type="submit" class="btn btn-primary waves-effect waves-light">Modifier</button>
                    </div>
                
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
 