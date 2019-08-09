@extends('website-layout.header')

@section('content')



<script src="https://www.google.com/recaptcha/api.js" async defer></script>

<div class="container">

    <div class="row">

        <div class="col-md-8 col-md-offset-2">

            <div class="panel panel-default user-reg">

                <div class="panel-heading"><i class="fa fa-user" aria-hidden="true"></i> Register</div>



                 @if (Session::has('success'))

                       <div class="alert alert-success alert-block">

                            <button type="button" class="close" data-dismiss="alert">×</button> 

                                <strong>{{Session::get('success') }}</strong>

                        </div>

                        @elseif(Session::has('danger'))



                        <div class="alert alert-danger alert-block">

                            <button type="button" class="close" data-dismiss="alert">×</button> 

                                <strong>{{Session::get('danger') }}</strong>

                        </div>

                @endif                



                <div class="panel-body">

                    <form class="form-horizontal" method="POST" id="demo-form" enctype="multipart/form-data" data-parsley-validate >

                        {{ csrf_field() }}



                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">

                            <label for="name" class="col-md-4 control-label">Nome <span style="color: red;">*</span></label>



                            <div class="col-md-6">

                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus maxlength="30">



                                @if ($errors->has('name'))

                                    <span class="help-block">

                                        <strong>{{ $errors->first('name') }}</strong>

                                    </span>

                                @endif

                            </div>

                        </div>





                        <div class="form-group{{ $errors->has('userName') ? ' has-error' : '' }}">

                            <label for="userName" class="col-md-4 control-label">cognome <span style="color: red;">*</span></label>



                            <div class="col-md-6">

                                <input id="userName" type="text" class="form-control" name="userName" value="{{ old('userName') }}" required autofocus maxlength="30">



                                @if ($errors->has('userName'))

                                    <span class="help-block">

                                        <strong>{{ $errors->first('userName') }}</strong>

                                    </span>

                                @endif

                            </div>

                        </div>



                         <div class="form-group{{ $errors->has('referralCode') ? ' has-error' : '' }}">

                            <label for="referralCode" class="col-md-4 control-label">Codice di riferimento</label>



                            <div class="col-md-6">

                                <input id="referralCode" type="text" class="form-control" name="referralCode" value="{{ old('referralCode') }}"  autofocus maxlength="10">



                                @if ($errors->has('referralCode'))

                                    <span class="help-block">

                                        <strong>{{ $errors->first('referralCode') }}</strong>

                                    </span>

                                @endif

                            </div>

                        </div>





                        <div class="form-group{{ $errors->has('telephoneNumber') ? ' has-error' : '' }}">

                            <label for="telephoneNumber" class="col-md-4 control-label">Telefono <span style="color: red;">*</span></label>



                            <div class="col-md-6">

                                <input id="telephoneNumber" type="text" class="form-control" name="telephoneNumber" value="{{ old('telephoneNumber') }}" required autofocus>



                                @if ($errors->has('telephoneNumber'))

                                    <span class="help-block">

                                        <strong>{{ $errors->first('telephoneNumber') }}</strong>

                                    </span>

                                @endif

                            </div>

                        </div>





                         <div class="form-group{{ $errors->has('postalCode') ? ' has-error' : '' }}">

                            <label for="postalCode" class="col-md-4 control-label">Cap <span style="color: red;">*</span></label>



                            <div class="col-md-6">

                                <input id="postalCode" type="text" class="form-control" name="postalCode" value="{{ old('postalCode') }}" required autofocus>



                                @if ($errors->has('postalCode'))

                                    <span class="help-block">

                                        <strong>{{ $errors->first('postalCode') }}</strong>

                                    </span>

                                @endif

                            </div>

                        </div>







                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

                            <label for="email" class="col-md-4 control-label">E-mail <span style="color: red;">*</span></label>



                            <div class="col-md-6">

                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>



                                @if ($errors->has('email'))

                                    <span class="help-block">

                                        <strong>{{ $errors->first('email') }}</strong>

                                    </span>

                                @endif

                            </div>

                        </div>



                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

                            <label for="password" class="col-md-4 control-label">Password <span style="color: red;">*</span></label>



                            <div class="col-md-6">

                                <input id="password" type="password" class="form-control" name="password" required>



                                @if ($errors->has('password'))

                                    <span class="help-block">

                                        <strong>{{ $errors->first('password') }}</strong>

                                    </span>

                                @endif

                            </div>

                        </div>



                        <div class="form-group">

                            <label for="password-confirm" class="col-md-4 control-label">Conferma password <span style="color: red;">*</span></label>



                            <div class="col-md-6">

                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>

                            </div>

                        </div>



                        <div class="form-group">

                            <div class="col-md-6 col-md-offset-4">

                                <div class="checkbox">

                                    <label>

                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }} required> Accetto i <a href="#"data-toggle="modal" data-target="#myModal">termini e le condizioni</a> di utilizzo.  

                                    </label>

                                </div>

                            </div>

                        </div>



                            



                       <div class="form-group">

                            <label class="col-md-4 control-label"></label>

                           <div class="col-md-6">

                            <div class="g-recaptcha" data-sitekey="6LfN1poUAAAAAEuHuVT8UINrMs9AX41QkwvoYJuc"></div>



                           </div>

                         </div>                  

                        <div class="form-group">

                            <div class="col-md-6 col-md-offset-4">

                                <button type="submit" name="register" class="btn btn-outline-primary">

                                    REGISTRATI

                                </button>

                            </div>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>



<div id="myModal" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <div class="modal-header">

        <button type="button" class="close" data-dismiss="modal">&times;</button>

        <h4 class="modal-title">Terms and Conditions</h4>

      </div>

      <div class="modal-body">

        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>

      </div>

      <div class="modal-footer">

        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

      </div>

    </div>



  </div>

</div>







@endsection

