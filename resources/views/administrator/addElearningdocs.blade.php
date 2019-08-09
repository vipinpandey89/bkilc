@extends('administrator.layout.admin')
@section('title','UserList')
@section('content')
		<div id="page-wrapper">
			<div class="main-page">

				<div class="row">
                    <div class="col-md-8 heading">
                     <h2> Aggiungi documento</h2>                     
                       
                    </div> 
                    <div class="col-md-4 text-right">
                        <div class="breadcumb">
                            <ul>
                                <li><a href="{{url('administrator/dashboard')}}"><i class="fa fa-tachometer" aria-hidden="true"></i>Bachea</a></li>
                                

                               <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                <li><a href="{{url('administrator/elearningdocuments')}}">Formazione</a></li>


                                <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                <li><a class="current" href="#">Aggiungi documento</a></li>
                               
                               
                            </ul>
                        </div>
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr/>


				<div class="forms">	
				<?php  $type = session('type', 'default'); ?>
                     @if (Session::has('success'))
                       <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button> 
                                <strong>{{Session::get('success') }}</strong>
                        </div>
					@endif		
					   @if (Session::has('error'))
                       <div class="alert alert-danger alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button> 
                                <strong>{{Session::get('error') }}</strong>
                        </div>
                @endif
					<div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
					
						
						<div class="form-body">
						 <form action="{{url('administrator/addElearningdocs')}}" method="post" enctype="multipart/form-data"> 
						 {{ csrf_field() }}
							<div class="form-group {{ $errors->has('filename') ? ' has-error' : '' }}">
								 <label for="filename">Nome del file</label> 
								 <input type="text" title="Nome del file" class="form-control" id="filename" name="filename" placeholder="Nome del file" value="{{Session::get('name') }}">
								  @if ($errors->has('filename'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('filename') }}</strong>
                                    </span>
                                   @endif
							</div>
							
							<div class="form-group {{ $errors->has('editor1') ? ' has-error' : '' }}">
								 <label for="exampleInputEmail1">	Descrizione</label> 
								 <textarea class="form-control" name="editor1" placeholder="Descrizione">{{old('editor1')}}</textarea>

								   @if ($errors->has('editor1'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('editor1') }}</strong>
                                    </span>
                                   @endif

							</div>
							<div class="form-group {{ $errors->has('point_value') ? ' has-error' : '' }}">
								 <label for="point_value">Punto Valore</label> 
								 <input type="text" title="Punto Valore" class="form-control" id="point_value" name="point_value" placeholder="Eg. 23" value="{{Session::get('point_value') }}">
								  @if ($errors->has('point_value'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('point_value') }}</strong>
                                    </span>
                                   @endif
							</div>
							
							<div class="form-group {{ $errors->has('filetype') ? ' has-error' : '' }}">
								  <label for="filetype">Seleziona Tipo:</label>
								  <select class="form-control" id="filetype" name="filetype" title="Seleziona Tipo">
								    <option value="">Seleziona Tipo</option>
								    <option value="image" <?php if($type == 'image'){ echo 'selected';} ?>>Immagine</option>
									<option value="video" <?php if($type == 'video'){ echo 'selected';} ?>>Video</option>
									<option value="document" <?php if($type == 'document'){ echo 'selected';} ?>>Documento</option>
									
								  </select>
								  @if ($errors->has('filetype'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('filetype') }}</strong>
                                    </span>
                                   @endif
							</div>
							
							<div class="form-group {{ $errors->has('file') ? ' has-error' : '' }}">
								 <label for="file">Caricare</label> 
								 <input type="file" title="Nessun file scelto" class="form-control" id="file" name="file">
								 @if ($errors->has('file'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('file') }}</strong>
                                    </span>
                                   @endif
							</div>

							

							  <button type="submit" class="btn btn-default" name="elearning_submit">Sottoscrivi</button 
							  
						  </form> 
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