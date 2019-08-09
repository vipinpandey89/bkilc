@extends('layouts.profile_dashboard')

@section('content')
 <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                   
                       @if (Session::has('success'))
                       <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button> 
                                <strong>{{Session::get('success') }}</strong>
                        </div>
                       @endif
                      <form class="form-horizontal" method="POST" action="{{url('addsocial')}}">
                        
                        {{ csrf_field() }}
                        <div class="form-group">
                            <a href="{{!empty($userData)?$userData->facebook_url:old('facebook_url') }}" class="facebook" style="padding-left: 55px;" target="_blank"><i class="fa fa-facebook"></i></a>
                            <input type="text" style="margin-left: 47px;width: 40%;" name="facebook" value="{{!empty($userData)?$userData->facebook_url:old('facebook_url') }}" />

                        </div></br></br>

                        <div class="form-group">
                           <a href="{{!empty($userData)?$userData->twitter_url:old('twitter_url') }}" class="twitter" style="padding-left: 55px;" target="_blank"><i class="fa fa-twitter"></i></a> 
                           <input style="margin-left: 47px;width: 40%;" type="text" name="twitter" value="{{!empty($userData)?$userData->twitter_url:old('twitter_url') }}" />

                        </div></br></br>

                        <div class="form-group">
                           <a href="{{!empty($userData)?$userData->linkedin_url:old('linkedin_url') }}" class="linkedin" style="padding-left: 55px;" target="_blank"><i class="fa fa-linkedin"></i></a>
                           <input style="margin-left: 47px;width: 40%;" type="text" name="linkedin" value="{{!empty($userData)?$userData->linkedin_url:old('linkedin_url') }}" />

                        </div></br></br>

                          <div class="form-group">
                           <a href="{{!empty($userData)?$userData->instagram_url:old('linkedinr_url') }}" class="linkedin" style="padding-left: 55px;" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                           <input style="margin-left: 47px;width: 40%;" type="text" name="instagram" value="{{!empty($userData)?$userData->instagram_url:old('linkedinr_url') }}" />

                        </div></br></br>
                        <button type="submit" name="updateprofile" class="btn btn-default">Sottoscrivi</button>

                    </form>
                       
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />
               
                </div>
             <!-- /. PAGE INNER  -->
            </div>

@endsection
