@extends('administrator.layout.admin')
@section('title','UserList')
@section('content')
		<div id="page-wrapper">
			<div class="main-page">

				<div class="row">
                    <div class="col-md-8 heading">
                     <h2> Modifica la carta</h2>                     
                       
                    </div> 
                    <div class="col-md-4 text-right">
                        <div class="breadcumb">
                            <ul>
                                <li><a href="{{url('administrator/dashboard')}}"><i class="fa fa-tachometer" aria-hidden="true"></i>Bachea</a></li>
                                <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                <li><a href="#">Utenti card</a></li>

                               <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                 <li><a href="{{url('administrator/list-card')}}">carica la carta digitale</a></li>

                                    <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                <li><a class="current" href="#">Modifica la carta</a></li>
                               
                            </ul>
                        </div>
                    </div>
         </div>
                 <!-- /. ROW  -->
            <hr/>

				<div class="forms">					
					<div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
						
						<div class="form-body">
							<form  method="post" enctype="multipart/form-data" > 
                             {{ csrf_field() }}
							<div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
								 <label for="title">Titolo della carta</label> 
								 <input type="text" class="form-control" id="title" name="title" placeholder="Titolo della carta" value="{{ !empty($getCardDetail)?$getCardDetail->title:old('title') }}">
								 @if ($errors->has('title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
							</div>


							<div class="form-group {{ $errors->has('image') ? ' has-error' : '' }}">
								 <label for="image">Immagine</label> 
								 <input type="file" class="form-control" id="image" name="image" placeholder="Immagine" value="{{!empty($getCardDetail->image)?$getCardDetail->image:''}}">

								  <input type="hidden" name="old_file" value="{{!empty($getCardDetail->image)?$getCardDetail->image:''}}"> 
	                                @if(!empty($getCardDetail->image))
	                                <img src="{{url('images/digital-card/'.$getCardDetail->image)}}" style="height: 82px;width: 89px;">
	                                @endif

								  @if ($errors->has('image'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
                                @endif
							</div>


							<div class="form-group {{ $errors->has('amount') ? ' has-error' : '' }}">
								 <label for="amount">Importo della carta</label> 
								 <input type="text" class="form-control" id="amount" name="amount" placeholder="Importo della carta" value="{{ !empty($getCardDetail)?$getCardDetail->amount:old('amount') }}">
								 @if ($errors->has('amount'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('amount') }}</strong>
                                    </span>
                                @endif
							</div>


							<!-- <div class="form-group {{ $errors->has('card_length') ? ' has-error' : '' }}">
								 <label for="card_length">lunghezza della carta (Mese)</label> 
								 <input type="text" class="form-control" id="card_length" name="card_length" placeholder="lunghezza della carta (Mese)" value="{{ !empty($getCardDetail)?$getCardDetail->card_length:old('card_length') }}">
								 @if ($errors->has('card_length'))
                                    <span class="help-block"> 
                                        <strong>{{ $errors->first('card_length') }}</strong>
                                    </span>
                                @endif
							</div>	

							 -->


							 <div class="form-group {{ $errors->has('card_length') ? ' has-error' : '' }} monthclass">
								 <label for="card_length">lunghezza della carta (Mese)</label> <input type="checkbox" name="month"  id="monthid" {{!empty($getCardDetail->card_length)?'checked':''}} >
								 <input type="number" class="form-control" id="card_length" name="card_length" style="display:none;" placeholder="lunghezza della carta (Mese)" value="{{ !empty($getCardDetail)?$getCardDetail->card_length:old('card_length') }}"  min="1" max="12">
								 @if ($errors->has('card_length'))
                                    <span class="help-block"> 
                                        <strong>{{ $errors->first('card_length') }}</strong>
                                    </span>
                                @endif
							</div>

							<div class="form-group {{ $errors->has('card_length_days') ? ' has-error' : '' }} daysclass">
								 <label for="card_length_days">lunghezza della carta (giorni)</label> <input type="checkbox" name="days" id="daysid" {{!empty($getCardDetail->card_length_days)?'checked':''}} > 
								 <input type="number" class="form-control" id="card_length_days" name="card_length_days" style="display:none;" placeholder="lunghezza della carta (giorni)" value="{{ !empty($getCardDetail)?$getCardDetail->card_length_days:old('card_length_days') }}"  min="1" max="29">
								 @if ($errors->has('card_length_days'))
                                    <span class="help-block"> 
                                        <strong>{{ $errors->first('card_length_days') }}</strong>
                                    </span>
                                @endif
							</div>



							<div class="form-group {{ $errors->has('editor1') ? ' has-error' : '' }}">
								 <label for="exampleInputEmail1">Descrizione</label> 
								 <textarea class="form-control" name="editor1" placeholder="Descrizione">{{!empty($getCardDetail)?$getCardDetail->description:old('editor1')}}</textarea>

								   @if ($errors->has('editor1'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('editor1') }}</strong>
                                    </span>
                                @endif

							</div>
							

							  <button type="submit" class="btn btn-default" name="addbutton">Sottoscrivi</button> </form> 
						</div>
					</div>											
				</div>
			</div>
		</div>
<script src="https://cdn.ckeditor.com/4.11.4/standard/ckeditor.js"></script>
<script>
	CKEDITOR.replace( 'editor1' );
 </script>		


<script>

$(document).click('#monthid',function(){

	if($('input[name="month"]').is(':checked')){
		$('#card_length').show();
		$('.daysclass').hide();
	  
	}else{
	 	$('#card_length').hide();
	 	$('#card_length').val('');
	 	$('.daysclass').show();
	}

});  
$(document).click('#daysid',function(){
  if($('input[name="days"]').is(':checked')){
		$('#card_length_days').show();
		$('.monthclass').hide();	  
	}else{
	 	$('#card_length_days').hide();
	 	$('#card_length_days').val('');
	 	$('.monthclass').show();
	}
});

$(document).ready(function(){
	if($('input[name="month"]').is(':checked')){
		$('#card_length').show();
		$('.daysclass').hide();
	  
	}else{
	 	$('#card_length').hide();
	 	$('#card_length').val('');
	 	$('.daysclass').show();
	}
}); 

$(document).ready(function(){
	if($('input[name="days"]').is(':checked')){
		$('#card_length_days').show();
		$('.monthclass').hide();	  
	}else{
	 	$('#card_length_days').hide();
	 	$('#card_length_days').val('');
	 	$('.monthclass').show();
	}
});
</script>

 @endsection