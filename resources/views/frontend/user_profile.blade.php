@extends('frontend.main_master')
@section('content')
    <div class="body-content">
        <div class="container">
            <div class="row">
                @include('frontend.body.user_header')
                <div class="col-md-6">
                    <div class="card">
                        <h3 class="text-center"><span class="text-success">UPDATE PROFILE</strong> </span></h3>
                        <div class="card-body">
                            <form method="POST" action="{{route('user.profile.store')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <h5>User Name <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="name" value="{{$user->name}}" class="form-control" > </div>
                                </div>
                                <div class="form-group">
                                    <h5>User Email <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="email" name="email" value="{{$user->email}}" class="form-control" > </div>
                                </div>
                                <div class="form-group">
                                    <h5>Phone <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="phone" value="{{$user->phone}}" class="form-control" > </div>
                                </div>


                                <div class="form-group">
                                    <h5>Profile Image <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="file" id="image" name="profile_photo_path" class="form-control"  > </div>
                                </div>
                                <div class="form-group">

                                    <img id="showImage"  src="{{(!empty($user->profile_photo_path)? url('upload/user_images'.$user->profile_photo_path):url('upload/user_images/download.png'))}}" alt="User Avatar" style="width: 100px; height: 100px;">
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
