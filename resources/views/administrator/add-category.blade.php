@extends('administrator.layout.admin')

@section('title','UserList')

@section('content')

		<div id="page-wrapper">

			<div class="row">
                    <div class="col-md-8 heading">
                     <h2> Gestione delle categorie</h2>                     
                       
                    </div> 
                    <div class="col-md-4 text-right">
                        <div class="breadcumb">
                            <ul>
                                <li><a href="{{url('administrator/dashboard')}}"><i class="fa fa-tachometer" aria-hidden="true"></i>Bachea</a></li>
                                <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                <li><a href="#">Affiliati</a></li>

                               <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                <li><a href="{{url('administrator/category-management')}}">Categoria</a></li>

                               <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                <li><a class="current" href="#">Gestione delle categorie</a></li>
                               
                               
                            </ul>
                        </div>
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr/>

			<div class="main-page">

				<div class="forms">					

					<div class="form-grids row widget-shadow" data-example-id="basic-forms"> 


						<div class="form-body">

							<form method="post" id="demo-form" data-parsley-validate> 



							<div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">

								 <label for="exampleInputEmail1">Titolo</label> 

								 <input type="text" class="form-control" id="exampleInputEmail1" name="title" value="{{old('title')}}" placeholder="nome categoria">

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

								 	<option value="0">Categoria madre</option>

								 	@if(!empty($category))

								 	@foreach($category as $item) 

								 			<option value="{{$item->id}}">{{$item->title}}</option>	

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