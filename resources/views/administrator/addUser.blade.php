@extends('administrator.layout.admin')
@section('title','UserList')
@section('content')
		<div id="page-wrapper">
			<div class="main-page">
				<div class="forms">					
					<div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
						<div class="form-title">
							<h4>Add User</h4>
						</div>
						<div class="form-body">
							<form> 

							<div class="form-group">
								 <label for="exampleInputEmail1">Name</label> 
								 <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
							</div>


							<div class="form-group">
								 <label for="exampleInputEmail1">Usre Name</label> 
								 <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
							</div>

							<div class="form-group">
								 <label for="exampleInputEmail1">ReferralCode</label> 
								 <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
							</div>

							<div class="form-group">
								 <label for="exampleInputEmail1">Telephone Number</label> 
								 <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
							</div>

							<div class="form-group">
								 <label for="exampleInputEmail1">Postal Code</label> 
								 <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
							</div>

							<div class="form-group">
								 <label for="exampleInputEmail1">E-Mail Address</label> 
								 <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
							</div>

							  <button type="submit" class="btn btn-default">Submit</button> </form> 
						</div>
					</div>											
				</div>
			</div>
		</div>
		@endsection