@extends('website-layout.header')
@section('content')

<div class="member-types">
    <div class="container v-center">
        <div class="row">
            <div class="col-sm-10 col-sm-offset-1">
                <div  class="row">
            <div class="col-md-5 col-sm-6">
                <div class="member-type">
                    <div class="icon">
                        <i class="fa fa-user" aria-hidden="true"></i>
                    </div>
                    <h3>ACCESSO PROMOTER</h3>

                    <a href="{{url('user-login')}}" class="btn btn-outline-primary btn-lg">ACCEDI</a>
                </div>
            </div>
            <div class="col-md-2 hidden-sm"></div>

            <div class="col-md-5 col-sm-6">
                <div class="member-type">
                    <div class="icon">
                        <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                    </div>

                    <h3>ACCESSO COMMERCIANTI</h3>

                    <a href="{{url('affiliatese-login')}}" class="btn btn-outline-primary btn-lg">ACCEDI</a>
                </div>
            </div>
</div></div>
        </div>

    </div>

</div>


@endsection