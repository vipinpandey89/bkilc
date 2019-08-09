@extends('Affiliatese.dashboard')

@section('content')
	<div id="page-wrapper">
			<div class="main-page">
			 @if (Session::has('success'))
                       <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button> 
                                <strong>{{Session::get('success') }}</strong>
                        </div>
                @endif
				<div class="forms">					
					<div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
<!-- 						<div class="form-title">
							<h4>Aggiungi post</h4>
						</div> -->
						<div class="form-body">
						<div class="panel panel-primary">
						  <div class="panel-heading">
							<h3 class="panel-title">Informazioni sul rivenditore</h3>
						  </div>
						  <div class="panel-body">
						  <form method="post" enctype="multipart/form-data">
							<div class="form-horizontal">
							<div class="form-group">
								<div class="col-md-6">
									<div class=" {{ $errors->has('Titolo') ? ' has-error' : '' }}">
								 <label for="exampleInputEmail1">Nome del titolare</label> 
								 <input type="text" class="form-control" name="Titolo" value="{{!empty($getPostDetail)?$getPostDetail->title:old('Titolo')}}" id="exampleInputEmail1" placeholder="Nome del titolare">

								    @if ($errors->has('Titolo'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('Titolo') }}</strong>
                                    </span>
                                @endif
							</div>
								</div>
								<div class="col-md-6">
									<div class=" {{ $errors->has('business_name') ? ' has-error' : '' }}">
								 <label for="exampleInputEmail1">Ragione Sociale</label> 
								 <input type="text" class="form-control" name="business_name" value="{{!empty($userProfile)?$userProfile->business_name:old('business_name')}}" id="exampleInputEmail1" placeholder="Ragione Sociale">

								    @if ($errors->has('business_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('business_name') }}</strong>
                                    </span>
                                @endif
							</div>
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-12">
									<div class=" {{ $errors->has('editor1') ? ' has-error' : '' }}">
								 <label for="exampleInputEmail1">	Descrizione</label> 
								 <textarea class="form-control" name="editor1" placeholder="Descrizione">{{!empty($getPostDetail)?$getPostDetail->description:old('description')}}</textarea>

								   @if ($errors->has('editor1'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('editor1') }}</strong>
                                    </span>
                                @endif

								</div>
								</div>
							</div>
							<div class="form-group">
								<div class="col-xs-12">
									<div class="panel-heading">
									<h3 class="panel-title">Informazioni Commerciali:</h3>
								  </div>
								</div>
							</div>
							<div class="form-group">
							<div class="col-md-6">
								<div class=" {{ $errors->has('iva') ? ' has-error' : '' }}">
							     
							    
								 <label for="exampleInputEmail1">IVA</label> 
								 <input type="text" class="form-control" name="iva" value="{{!empty($getPostDetail)?$getPostDetail->iva:old('iva')}}" id="exampleInputEmail1" placeholder="IVA">
                                  
								    @if ($errors->has('iva'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('iva') }}</strong>
                                    </span>
                                @endif
                                
							</div>
							</div>
							<div class="col-md-6">
								<div class=" {{ $errors->has('discount_amount') ? ' has-error' : '' }}">
							     
							    
								 <label for="exampleInputEmail1">Ammontare di sconto</label> 
								 <input type="number" min="10" class="form-control" name="discount_amount" value="{{!empty($getPostDetail)?$getPostDetail->discount_amount:old('discount_amount')}}" id="exampleInputEmail1" placeholder="Ammontare di sconto">
                                  
								    @if ($errors->has('discount_amount'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('discount_amount') }}</strong>
                                    </span>
                                @endif
                                
							</div>
							</div>
							</div>
							<div class="form-group">
								<div class="col-md-6">
								<div class="{{ $errors->has('category') ? ' has-error' : '' }}">
								<label for="category" class="">Categoria</label>
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
								</div>
								<div class="col-md-6">
								<div class="{{ $errors->has('subcategory') ? ' has-error' : '' }}">
									<label for="subcategory" class="">Sottocategoria</label>
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
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-6">
									<div class="custom-file-type {{ $errors->has('logoImage') ? ' has-error' : '' }}">

                                            <label for="pariva" class="">Carica logo</label>   

                                            <input id="profileImage" type="file" class="form-control custom-file-input" name="logoImage" >
											
                                             <input type="hidden" name="old_logo" value="{{!empty($userProfile->logo)?$userProfile->logo:''}}">
											<div class="jumbotron">
											<div class="image-wrap">
											@if(!empty($userProfile->logo))
                                            <img src="{{url('dealer_logos/'.$userProfile->logo)}}" style="height: 82px;width: 89px;">
                                            @endif
											</div>
                                            @if ($errors->has('logoImage'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('logoImage') }}</strong>
                                                </span>
                                            @endif
											</div>
                                            
                                        </div>
								</div>
								<div class="col-md-6">
									<div class=" custom-file-type {{ $errors->has('video') ? ' has-error' : '' }}">

                                            <label for="pariva" class="">Carica video</label>   
											<div class="browse_file">
                                            <input id="profileVideo" type="file" class="form-control custom-file-input" name="video" >

                                             <input type="hidden" name="old_video" value="{{!empty($userProfile->video)?$userProfile->video:''}}">
											 </div>
											<div class="jumbotron">
											<div class="image-wrap">
											@if(!empty($userProfile->video))
                                         <!--    <iframe src="{{url('dealer_videos/'.$userProfile->video)}}" style="height: 82px;width: 89px;"></iframe> -->
                                             <video width="89" height="82" controls >
                                              <source src="{{url('dealer_videos/'.$userProfile->video)}}" type="video/mp4">                                             
                                            </video>
                                            @endif
											</div>
                                            @if ($errors->has('video'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('video') }}</strong>
                                                </span>
                                            @endif
											</div>
                                            
                                        </div>
                                        
									<?php
									$fnames = $userProfile->filename;
									$arr = explode("$", $fnames);
									
									$file_ids = $userProfile->file_id;
									$idarr = explode("$", $file_ids);
									
									
									//echo '<pre>'; print_r($arr); die;
                                    //$someArray = json_decode($userProfile->filename, true); ?>
								</div>
							</div>
							<div class="form-group">
								<div class="col-xs-12">
									<div class="custom-file-type {{ $errors->has('filename') ? ' has-error' : '' }}">    
                                    <div class="input-group control-group increment" >
                                        <input type="file" name="filename[]" class="form-control custom-file-input">
										<input type="hidden" name="old_filename" value="{{!empty($arr[0])?$arr[0]:''}}">
                                        <div class="input-group-btn"> 
                                         <button class="btn btn-primary" type="button"><i class="glyphicon glyphicon-plus"></i>Add</button>
                                        </div>
                                    </div>
                                    <div class="clone hide custom-file-type">
                                        <div class="control-group input-group" style="margin-top:10px">
                                            <input type="file" name="filename[]" class="form-control custom-file-input">
                                            <div class="input-group-btn"> 
                                                <button class="btn btn-danger" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="jumbotron">
									@if (count($arr) > 0)
								     <div class="">
                                        <ul style="margin:0;padding:0;">		 
									 @foreach($arr as $k => $arrval)
                                     @if(!empty($arrval))								 
                                      
                                          
                                              <li class="afimages">
											  <a class="afimgdelete" href="{{url('deleteimage/'.$idarr[$k])}}"><i class="fa fa-times" aria-hidden="true"></i></a>
											  <img src="{{url('dealer_images/'.$arrval)}}" style="height: 82px;width: 89px;"></li>
                                        
                                      
									  @endif
									  @endforeach
									    </ul>
                                      </div>
                                      @endif
									</div>
                                         @if ($errors->has('filename'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('filename') }}</strong>
                                                </span>
                                         @endif
                                     </div>
								</div>
							</div>
							<div class="form-group">
								<div class="col-xs-12">
									{{ csrf_field() }}
							
                              <input type="hidden" class="form-control" name="id" value="{{!empty($getPostDetail)?$getPostDetail->id:old('id')}}" id="exampleInputEmail1" >
							  <button type="submit" name="addbutton" class="btn btn-primary btn-custom">Salva</button>
								</div>
							</div>
							</div>
							</form>
						  </div>
						</div>
						</div>
					</div>											
				</div>
			</div>
		</div>
 <script src="https://cdn.ckeditor.com/4.11.4/standard/ckeditor.js"></script>
<script>
	CKEDITOR.replace( 'editor1' );
 </script>	
<style>
    fieldset {
    padding: .35em .625em .75em;
    margin: 0 2px;
    border: 1px solid #d1d1d1;
    }
</style>
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
<style>
.afimages{
    width: 90px;
    display: inline-block;
}
.afimgdelete{
	position: absolute;
	width: 5px;
	color: red;
}

</style>
@endsection
