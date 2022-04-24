@extends('admin.admin_master')
@section('content')



    <div class="col-mb-12">

        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Add Category</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                    <form action="{{route('category.update')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{$category->id}}">
                        <input type="hidden" name="old_icon" value="{{$category->category_icon}}">
                        <div class="form-group">
                            <h5>Category Name English <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="category_name_en" value="{{$category->category_name_en}}"  class="form-control" >
                                @error('category_name_en')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <h5>Category Name Arabic <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="category_name_ar" value="{{$category->category_name_ar}}" class="form-control" >
                                @error('category_name_ar')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <h5>Category Icon <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="category_icon" value="{{$category->category_icon}}" class="form-control" >
                            </div>
                                @error('category_icon')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>



                            <br>
                            <div class="text-xs-right">
                                <input type="submit" class="btn btn-rounded btn-info" value="Edit Category">
                            </div>

                    </form>

                </div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->

        <!-- /.box -->
    </div>
@endsection
