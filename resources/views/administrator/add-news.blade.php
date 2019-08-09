@extends('administrator.layout.admin')
@section('title','UserList')
@section('content')
		<div id="page-wrapper">
			<div class="main-page">

					<div class="row">
                    <div class="col-md-8 heading">
                     <h2> Aggiungi notizia</h2>                     
                       
                    </div> 
                    <div class="col-md-4 text-right">
                        <div class="breadcumb">
                            <ul>
                                <li><a href="{{url('administrator/dashboard')}}"><i class="fa fa-tachometer" aria-hidden="true"></i>Bachea</a></li>
                                <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                <li><a href="#">News & Eventi</a></li>

                               <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                <li><a  href="{{url('administrator/userlist')}}">Lista</a></li>

                                <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                <li><a class="current" href="#">Aggiungi notizia</a></li>
                               
                            </ul>
                        </div>
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr/>

				<div class="forms">					
					<div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
						
						<div class="form-body">
							<form method="post" id="demo-form" data-parsley-validate enctype="multipart/form-data"> 

							

							<div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
								 <label for="exampleInputEmail1">Title</label> 
								 <input type="text" class="form-control" id="exampleInputEmail1" name="title" value="{{ !empty($userProfile)?$userProfile->userName:old('title')}}" placeholder="Nome della ditta" maxlength="30">

								    @if ($errors->has('title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif

							</div>

							

							
              <div class="form-group ">
                <label for="editor1">Descrizione</label> 
                <textarea class="form-control" name="editor1" placeholder="Descrizione">{{old('editor1')}}</textarea>
                @if ($errors->has('editor1'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('editor1') }}</strong>
                                    </span>
                                @endif

              </div>  


              <div class="form-group {{ $errors->has('file') ? ' has-error' : '' }}">
                 <label for="exampleInputEmail1">File</label> 
                 <input type="file" class="form-control" id="exampleInputEmail1" name="file" value="{{ !empty($userProfile)?$userProfile->userName:old('file')}}" placeholder="Nome della ditta" maxlength="30">

                    @if ($errors->has('file'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('file') }}</strong>
                                    </span>
                                @endif

              </div>
							 

							

								  {{ csrf_field() }}

							  <button type="submit" name="add" class="btn btn-default">Salva</button> </form> 
						</div>
					</div>											
				</div>
			</div>
		</div>


 <script src="https://cdn.ckeditor.com/4.11.4/standard/ckeditor.js"></script>


<script>
  CKEDITOR.replace( 'editor1' );
 </script>  
@endsection