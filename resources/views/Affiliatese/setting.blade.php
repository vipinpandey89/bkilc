@extends('Affiliatese.dashboard')

@section('content')

		<!-- //header-ends -->
		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page">
				<div class="tables">
			  @if (Session::has('success'))
                       <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button> 
                                <strong>{{Session::get('success') }}</strong>
                        </div>
                @endif
									
					<div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
					
						<div class="form-title">
							<h4>Ambientazione</h4>
						</div>
						<div class="form-body">
						 <form action="{{url('uploadlogo')}}" method="post" enctype="multipart/form-data"> 
						 {{ csrf_field() }}
							
							
							
							
							<div class="form-group">
								 <label for="file">Carica logo</label> 
								 <input type="file" title="Nessun file scelto" class="form-control" required id="file" name="file">
							</div>

							

							  <button type="submit" class="btn btn-default">Sottoscrivi</button> 
							  
						  </form> 
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--footer-->
		@endsection