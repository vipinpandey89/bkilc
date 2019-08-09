@extends('administrator.layout.admin')

@section('title','UserList')

@section('content')

		<div id="page-wrapper">

			<div class="main-page">

				<div class="forms">					

					<div class="form-grids row widget-shadow" data-example-id="basic-forms"> 

						<div class="form-title">

							<h4>Gestione delle categorie</h4>

						</div>

						<div class="form-body">

							<form method="post" id="demo-form" data-parsley-validate> 



							<div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">

								 <label for="exampleInputEmail1">Titolo</label> 

								 <input type="text" class="form-control" id="exampleInputEmail1" name="title" value="{{!empty($categoryGetById)?$categoryGetById->title:old('title')}}" placeholder="nome categoria">

								   @if ($errors->has('title'))

                                    <span class="help-block">

                                        <strong>{{ $errors->first('title') }}</strong>

                                    </span>

                                @endif

							</div>





							<div class="form-group {{ $errors->has('category') ? ' has-error' : '' }}">

								 <label for="exampleInputEmail1">Seleziona categoria</label>

								 <select class="form-control" name="category">

								 	<option value="">Seleziona titolo</option>

								 	<option value="0"<?php echo($categoryGetById->parent_id=='0')?'selected':'';?>>Categoria madre</option>

								 	@if(!empty($category))

								 	@foreach($category as $item)

								 			<option value="{{$item->id}}" <?php echo ($categoryGetById->parent_id==$item->id)?'selected':'';?>>{{$item->title}}</option>	

								 	@endforeach

								 	@endif

								 	

								 </select> 

										



								  @if ($errors->has('category'))

                                    <span class="help-block">

                                        <strong>{{ $errors->first('category') }}</strong>

                                    </span>

                                @endif



							</div>



								  {{ csrf_field() }}



							  <button type="submit" name="addbutton" class="btn btn-default">Salva</button> 

							</form> 

						</div>

					</div>											

				</div>

			</div>

		</div>



<!--<script type="text/javascript">

$(function () {

  $('#demo-form').parsley().on('field:validated', function() {

    var ok = $('.parsley-error').length === 0;

    $('.bs-callout-info').toggleClass('hidden', !ok);

    $('.bs-callout-warning').toggleClass('hidden', ok);

  })



});



</script>	-->	

		@endsection