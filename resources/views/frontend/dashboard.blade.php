@extends('frontend.main_master')
@section('content')
    <div class="body-content">
        <div class="container">
    <div class="row">
        @include('frontend.body.user_header')
        <div class="col-md-6">
    <div class="card">
        <h3 class="text-center"><span class="text-danger">Hi <strong>{{Auth()->user()->name}}</strong></span> Welcome To Easy Shop Online</h3>


    </div>


        </div>



    </div>


        </div>

    </div>
@endsection
