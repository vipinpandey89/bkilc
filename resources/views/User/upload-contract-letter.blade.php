@extends('layouts.profile_dashboard')

@section('content')

 <div id="page-wrapper" >
            <div id="page-inner">  
               <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">                                    
                                     @if (Session::has('success'))
                                       <div class="alert alert-success alert-block">
                                            <button type="button" class="close" data-dismiss="alert">×</button> 
                                                <strong>{{Session::get('success') }}</strong>
                                        </div>
                                     @endif
                                    <form role="form" method="post" id="demo-form" data-parsley-validate enctype="multipart/form-data">
                                         {{ csrf_field() }}
                                         
                                        

                                        <div class="form-group form-group{{ $errors->has('contact_letter') ? ' has-error' : '' }}">
                                             <label for="contact_letter" class="col-md-4 control-label">Upload </label>
                            
                                            <input id="contact_letter" type="file" class="form-control" name="contact_letter"  required autofocus readonly="">

                                            @if ($errors->has('contact_letter'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('contact_letter') }}</strong>
                                                </span>
                                            @endif

                                        </div>


                                          <button type="submit" name="updateprofile" class="btn btn-default">Conferma modifiche</button>

                                    </form>                                  
                                </div>
                            </div>
                        </div>
                    </div>                   
                </div>
            </div>              
         </div>            
      </div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
$(function () {
  $('#demo-form').parsley().on('field:validated', function() {
    var ok = $('.parsley-error').length === 0;
    $('.bs-callout-info').toggleClass('hidden', !ok);
    $('.bs-callout-warning').toggleClass('hidden', ok);
  })

});



</script>
@endsection
