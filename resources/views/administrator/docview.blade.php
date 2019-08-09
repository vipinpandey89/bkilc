@extends('administrator.layout.admin')
@section('title','UserList')
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
					<a href="{{url('administrator/elearningdocuments')}}" class="btn btn-primary"><-- Back</a>				
					<div class="table-responsive bs-example widget-shadow" style="text-align: center;">
						<h4>Visualizza documento</h4>

					<!--<a href="{{url('administrator/adduser')}}" class="btn btn-primary" style="margin-left: 1427px;margin-bottom: 10px;">Add User</a>		-->			
                        <h3>{{$docDetail['file_name']}}</h3>
                        <?php if($docDetail['file_type'] == 'image'){ ?>
						<img style="width: 900px;" src="<?php echo url('/elearningdocs/'.$docDetail['file']);?>" title="<?php echo $docDetail['file_type']; ?>" />
						<?php }else{ ?>
						 <iframe style="width: 900px;height: 900px;" src="<?php echo url('/elearningdocs/'.$docDetail['file']);?>" />
						<?php } ?>
						<p style="height: 28px;"></p>
						 <p>{{strip_tags($docDetail['description'])}}</p>
					</div>
				</div>
			</div>
		</div>
		<!--footer-->
		@endsection