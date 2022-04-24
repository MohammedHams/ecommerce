@extends('admin.admin_master')
@section('content')



    <div class="col-mb-12">

    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Add Brand</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="table-responsive">
                <form action="{{route('brands.update')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{$brand->id}}">
                    <input type="hidden" name="old_image" value="{{$brand->brand_image}}">
                    <div class="form-group">
                        <h5>Brand Name English <span class="text-danger">*</span></h5>
                        <div class="controls">
                            <input type="text" name="brand_name_en" value="{{$brand->brand_name_en}}"  class="form-control" >
                            @error('brand_name_en')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <h5>Brand Name Arabic <span class="text-danger">*</span></h5>
                        <div class="controls">
                            <input type="text" name="brand_name_ar" value="{{$brand->brand_name_ar}}" class="form-control" >
                            @error('brand_name_ar')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <h5>Brand Image <span class="text-danger">*</span></h5>
                        <div class="controls">
                            <input  type="file" name="brand_image"  class="form-control" >
                            <img src="{{asset($brand->brand_image)}}" style="height: 100px;width: 100px"/>
                            @error('brand_image')
                            <div class="text-danger">{{$message}}</div>
                            @enderror

                        </div>
                        <br>
                        <div class="text-xs-right">
                            <input type="submit" class="btn btn-rounded btn-info" value="Edit Brand">
                        </div>
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
