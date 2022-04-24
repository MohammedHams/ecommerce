@extends('frontend.main_master')
@section('content')
    <div class="body-content">
        <div class="container">
            <div class="row">
@include('frontend.body.user_header')
                <div class="col-md-6">
                    <div class="card">
                        <h3 class="text-center"><span class="text-success">Change Password</strong> </span></h3>
                        <div class="card-body">
                            <form method="POST" action="{{route('user.change.password.store')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <h5>Current Password <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="password" id="current_password" name="oldPassword"  class="form-control" > </div>
                                </div>
                                <div class="form-group">
                                    <h5>New Password <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input id="password" type="password" name="password"  class="form-control" > </div>
                                </div>
                                <div class="form-group">
                                    <h5>Confirm New Password <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input id="password_confirmation" type="password" name="password_confirmation"  class="form-control" > </div>
                                </div>


                                <div class="text-xs-right">
                                    <input type="submit" class="btn btn-rounded btn-success" value="UPDATE">
                                </div><br><br>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#image').change(function (e){
                var reader = new FileReader();
                reader.onload =function (e){
                    $('#showImage').attr('src',e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });


    </script>

@endsection
