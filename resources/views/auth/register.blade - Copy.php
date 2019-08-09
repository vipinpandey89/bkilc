@extends('layouts.app')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="{{URL::asset('js/parsley.js')}}"></script>
<script src="{{URL::asset('js/parsley.min.js')}}"></script>

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('userName') ? ' has-error' : '' }}">
                            <label for="userName" class="col-md-4 control-label">User Name</label>

                            <div class="col-md-6">
                                <input id="userName" type="text" class="form-control" name="userName" value="{{ old('userName') }}" required autofocus>

                                @if ($errors->has('userName'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('userName') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                         <div class="form-group{{ $errors->has('referralCode') ? ' has-error' : '' }}">
                            <label for="referralCode" class="col-md-4 control-label">ReferralCode</label>

                            <div class="col-md-6">
                                <input id="referralCode" type="text" class="form-control" name="referralCode" value="{{ old('referralCode') }}"  autofocus>

                                @if ($errors->has('referralCode'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('referralCode') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('telephoneNumber') ? ' has-error' : '' }}">
                            <label for="telephoneNumber" class="col-md-4 control-label">Telephone Number</label>

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
                            <label for="postalCode" class="col-md-4 control-label">Postal Code</label>

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
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

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
                            <label for="password" class="col-md-4 control-label">Password</label>

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
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>



                             <div class="row">
                                  <div class="col-md-4"></div>
                                  <div class="form-group col-md-4">
                                     <div class="captcha">
                                       <span>{!! captcha_img() !!}</span>
                                       <button type="button" class="btn btn-success"><i class="fa fa-refresh" id="refresh"></i></button>
                                       </div>
                                    </div>
                                </div>





                         <div class="form-group{{ $errors->has('captcha') ? ' has-error' : '' }}">
                            <label for="captcha" class="col-md-4 control-label">Enter Captcha</label>

                            <div class="col-md-6">
                                <input id="captcha" type="text" class="form-control" placeholder="Enter Captcha" name="captcha">

                                @if ($errors->has('captcha'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('captcha') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>




                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script type="text/javascript">

$(document).on('click','#refresh',function(){

    //alert();
  $.ajax({
     type:'GET',
     url:'refreshcaptcha',
     success:function(data){
        alert(data);
        //$(".captcha span").html(data.captcha);
     }
  });
});
</script>

@endsection
