@extends('administrator.layout.admin')

@section('title','UserList')

@section('content')

		<div id="page-wrapper">

			<div class="row">
                    <div class="col-md-8 heading">
                     <h2> Elenco di video</h2>                     
                       
                    </div> 
                    <div class="col-md-4 text-right">
                        <div class="breadcumb">
                            <ul>
                                <li><a href="{{url('administrator/dashboard')}}"><i class="fa fa-tachometer" aria-hidden="true"></i>Bachea</a></li>
                                <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                <li><a href="#">News ed Eventi</a></li>

                               

                               <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                <li><a class="current" href="#">Elenco di video</a></li>
                               
                               
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

							<form method="post" id="demo-form" enctype="multipart/form-data" data-parsley-validate > 

							<div class="form-group {{ $errors->has('type') ? ' has-error' : '' }}">

								 <label for="exampleInputEmail1">Tipo di video</label> 

								 <select class="form-control" id="exampleInputEmail1" name="type">
								 		<option value=' '>Select Type</option>
								 		<option value='1'>Affiliati gratis</option>
								 		<option value='2'>Lavora con noi</option>
								 		<option value='3'>Risparmia con la card</option>
								 </select>

								   @if ($errors->has('type'))

                                    <span class="help-block">

                                        <strong>{{ $errors->first('type') }}</strong>

                                    </span>

                                @endif

						</div>


							<div class="form-group {{ $errors->has('video') ? ' has-error' : '' }}">

								 <label for="exampleInputEmail1">Video</label>

								  <input id="video" type="file" class="form-control custom-file-input" name="video" >


								  @if ($errors->has('video'))

                                    <span class="help-block">

                                        <strong>{{ $errors->first('video') }}</strong>

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


@endsection