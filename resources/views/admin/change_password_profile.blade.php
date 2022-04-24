@extends('admin.admin_master')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <div class="container-full">

        <!-- Main content -->
        <section class="content">
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">

                        Admin Change Password</h4>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form action="{{route('update.change.password.store')}}" method="POST" >
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-md-6">
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


                                            </div>




                                            </div>

                                        </div>
                                <div class="text-xs-right">
                                    <input type="submit" class="btn btn-rounded btn-info" value="UPDATE">
                                </div>
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

@endsection
