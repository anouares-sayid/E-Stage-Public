 
 
<!--Modal modifier -->
<div id="messageModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">  
                   <div class="modal-header">
                        <h5 class="modal-title mt-0">Contacter</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('messages.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                    <div class="modal-body">
                            @if($errors->any())
                                @foreach($errors->all() as $error)
                                    <div class="col-6-auto">
                                        <div class="alert alert-danger" role="alert">{{ $error }}</div>
                                    </div>
                                @endforeach
                            @endif
                        <div class="row align-items-center">
                         
                            <input type="hidden" name="receiver_id" value="{{$professeur->user->id}}">
                            <div class="col-lg-12">
                            <div class="form-group auth-form-group-custom mb-4">
                                <i class="ri-lock-2-line auti-custom-input-icon"></i>
                                <label for="password-confirm">Message</label>
                                <textarea name="message" id="" cols="30" rows="10" class="form-control"></textarea>
                            </div>
                            </div>
                        </div> <!-- end row -->
                    </div>
        
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light waves-effect" data-dismiss="modal">Fermer</button>
                        <button type="submit" class="btn btn-primary waves-effect waves-light">Envoyer</button>
                    </div>
                
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
 