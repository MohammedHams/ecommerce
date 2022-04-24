@extends('admin.admin_master')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <div class="container-full">

        <!-- Main content -->
        <section class="content">
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">

                        Admin Profile</h4>
                </div>
            <div class="box-body">
                <div class="row">
                    <div class="col">
                        <form action="{{route('admin.profile.store',$editData->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Admin Name <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="name" name="name" value="{{$editData->name}}" class="form-control" > </div>
                                            </div>

                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Admin Email <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="email" name="email" value="{{$editData->email}}" class="form-control" > </div>
                                            </div>


                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">

                                        <div class="form-group">
                                        <h5>Profile Image <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="file" id="image" name="profile_photo_path" class="form-control" required > </div>
                                    </div>
                                        </div>
                                        <div class="col-md-6">

                                            <div class="form-group">
                                                <img id="showImage"  src="{{(!empty($editData->profile_photo_path)? url('upload/admin_images'.$editData->profile_photo_path):url('upload/admin_images/download.png'))}}" alt="User Avatar" style="width: 100px; height: 100px;">                                            </div>
                                        </div>

                                    </div>


                                </div>
                            </div>
                            <div class="text-xs-right">
                                <input type="submit" class="btn btn-rounded btn-info" value="UPDATE">
                            </div>
                        </form>

                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            </div>
            <!-- /.box-body -->
    </section>
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
