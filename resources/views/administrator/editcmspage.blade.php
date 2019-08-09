@extends('administrator.layout.admin')



@section('title','UserList')



@section('content')



		<div id="page-wrapper">



			<div class="row">

                    <div class="col-md-8 heading">

                     <h2> Modifica video</h2>                     

                       

                    </div> 

                    <div class="col-md-4 text-right">

                        <div class="breadcumb">

                            <ul>

                                <li><a href="{{url('administrator/dashboard')}}"><i class="fa fa-tachometer" aria-hidden="true"></i>Bachea</a></li>

                                <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>

                                <li><a href="#">News ed Eventi</a></li>





                               <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>

                                <li><a class="current" href="#">Modifica video</a></li>

                               

                               

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

								 		<option value=' '>Seleziona tipo</option>

								 		<option value='1'{{($getPageDetail->page_title=='1')?'selected':''}}>Affiliati gratis</option>

								 		<option value='2' {{($getPageDetail->page_title=='2')?'selected':''}}>Lavora con noi</option>

								 		<option value='3' {{($getPageDetail->page_title=='3')?'selected':''}}>Risparmia con la card</option>

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



								  <input type="hidden" name="old_video" value="{{$getPageDetail->video}}">



								  @if(!empty($getPageDetail->video))

                                       

                                             <video width="89" height="82" controls >

                                              <source src="{{url('dealer_videos/'.$getPageDetail->video)}}" type="video/mp4">                                             

                                            </video>

                                       @endif




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