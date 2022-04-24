<div class="col-md-2"><br>
    <img src="{{(!empty($user->profile_photo_path)? url('upload/user_images'.$user->profile_photo_path):url('upload/user_images/download.png'))}}" alt="" class="card-img-top" style="border-radius: 50%" height="100%" width="100%"><br><br>
    <ul class="list-group list-group-flush">

        <a href="{{route('user.home')}}" class="btn btn-primary btn-sm btn-block">Home</a>
        <a href="{{route('user.profile')}}" class="btn btn-primary btn-sm btn-block">Profile Update</a>
        <a href="{{route('user.change.password')}}" class="btn btn-primary btn-sm btn-block">Change Password</a>
        <a href="{{route('user.logout')}}" class="btn btn-danger btn-sm btn-block">logout</a>

    </ul>

</div>
<div class="col-md-2">



</div>
