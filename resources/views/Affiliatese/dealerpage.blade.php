@extends('Affiliatese.dashboard')

@section('content')
 <div id="page-wrapper" >
            <div id="page-inner">
                
               
               <div class="row">
                <div class="col-md-12">
                    <!-- Form Elements -->
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

<?php //echo '<pre>'; print_r($userProfile->id); die; ?>

                                    <form role="form" method="post" id="demo-form" data-parsley-validate enctype="multipart/form-data">
                                         {{ csrf_field() }}
       
										
						<div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
                            <label for="category" class="col-md-4 control-label">Categoria</label>

                           
								<select class="form-control" id="category" name="category" onchange="getsubcategory(this.value);">
									<option value="">Seleziona categoria</option>
									@if(!empty($getCategories))
										@foreach($getCategories as $catval)
											@if($catval->parent_id == 0)
												<option <?php if(!empty($userProfile)){ if($userProfile->category == $catval->id){ echo 'selected'; }} ?> value="{{$catval->id}}">{{$catval->title}}</option>
											@endif
										@endforeach
									@endif
                                   
								</select>

                                @if ($errors->has('category'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('category') }}</strong>
                                    </span>
                                @endif
                            
                        </div>
						
						<div class="form-group{{ $errors->has('subcategory') ? ' has-error' : '' }}">
                            <label for="subcategory" class="col-md-4 control-label">Sottocategoria</label>
							<div id="subcat">
								<select class="form-control" id="subcategory" name="subcategory">
									<option value="">Seleziona sottocategoria</option>
									@if(!empty($getCategories))
										@foreach($getCategories as $catval)
											@if($catval->parent_id == $userProfile->category)
												<option <?php if(!empty($userProfile)){ if($userProfile->sub_category == $catval->id){ echo 'selected'; }} ?> value="{{$catval->id}}">{{$catval->title}}</option>
											@endif
										@endforeach
									@endif
									
								</select>
							</div>	

                                @if ($errors->has('subcategory'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('subcategory') }}</strong>
                                    </span>
                                @endif
                            
                        </div> 
										
									



                                     
                                        
                                        <div class="form-group form-group{{ $errors->has('logoImage') ? ' has-error' : '' }}">

                                              <label for="pariva" class="col-md-4 control-label">Carica logo</label>   

                                            <input id="profileImage" type="file" class="form-control" name="logoImage" >

                                             <input type="hidden" name="old_logo" value="{{!empty($userProfile->logo)?$userProfile->logo:''}}"> 
                                            @if(!empty($userProfile->logo))
                                            <img src="{{url('dealer_logos/'.$userProfile->logo)}}" style="height: 82px;width: 89px;">
                                            @endif

                                            @if ($errors->has('logoImage'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('logoImage') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        
                                      
                                    <div class="form-group form-group{{ $errors->has('filename') ? ' has-error' : '' }}">    
                                    <div class="input-group control-group increment" >
                                        <input type="file" name="filename[]" class="form-control">
                                        <div class="input-group-btn"> 
                                         <button class="btn btn-success" type="button"><i class="glyphicon glyphicon-plus"></i>Add</button>
                                        </div>
                                    </div>
                                    <div class="clone hide">
                                        <div class="control-group input-group" style="margin-top:10px">
                                            <input type="file" name="filename[]" class="form-control">
                                            <div class="input-group-btn"> 
                                                <button class="btn btn-danger" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
									$fnames = $userProfile->filename;
									$arr = explode("$", $fnames);
									
									$file_ids = $userProfile->file_id;
									$idarr = explode("$", $file_ids);
									
									
									//echo '<pre>'; print_r($arr); die;
                                    //$someArray = json_decode($userProfile->filename, true); ?>
                                     @if (count($arr) > 0)
									 @foreach($arr as $k => $arrval)
                                     @if(!empty($arrval))								 
                                      <div class="alert alert-danger">
                                        
                                        <ul>
                                          
                                              <li><a href="{{url('deleteimage/'.$idarr[$k])}}"><i class="fa fa-trash-o" aria-hidden="true"></i></a><img src="{{url('dealer_images/'.$arrval)}}" style="height: 82px;width: 89px;"></li>
                                        
                                        </ul>
                                      </div>
									  @endif
									  @endforeach
                                      @endif
                                      
                                       
                                         @if ($errors->has('filename'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('filename') }}</strong>
                                                </span>
                                         @endif
                                     </div>

                                        
                                        <button type="submit" name="updatepage" class="btn btn-default">Conferma modifiche</button>                                     
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
<script type="text/javascript">

    $(document).ready(function() { 

      $(".btn-success").click(function(){ 
          var html = $(".clone").html();
          $(".increment").after(html);
      });

      $("body").on("click",".btn-danger",function(){ 
          $(this).parents(".control-group").remove();
      });

    });

</script>
<script>

function getsubcategory(catv){
	$.ajax({
                url: "get-affiliatese-sucat1",
                type: "post",
                data: {'_token': "{{ csrf_token() }}",'catv': catv},
                success: function(d) {
					$('#subcat').html(d);
                }
            });
}
</script>


@endsection
