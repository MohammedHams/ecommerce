@extends('admin.admin_master')
@section('content')
<div class="col-12">

    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Edit SubCategory</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="table-responsive">
                <form action="{{route('subcategory.update')}}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{$subcategories->id}}">
                    <div class="form-group">
                        <h5>Select Category <span class="text-danger">*</span></h5>
                        <div class="controls">
                            <select name="category_id" value="selected" required="" class="form-control" aria-invalid="false">
                                <option value="" selected="" disabled="">Select Category</option>
                                @foreach($category as $item)

                                    <option value="{{$item->id}}" {{$item->id==$subcategories->category_id ?'selected': ''}}>{{$item->category_name_en}}</option>
                                @endforeach
                            </select>
                        </div>
                        <br>
                        <div class="form-group">
                            <h5>SubCategory Name English <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" value="{{$subcategories->subcategory_name_en}}" name="subcategory_name_en"  class="form-control" >
                                @error('subcategory_name_en')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <h5>SubCategory Name Arabic <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" value="{{$subcategories->subcategory_name_ar}}" name="subcategory_name_ar"  class="form-control" >
                                @error('subcategory_name_ar')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="text-xs-right">
                            <input type="submit" class="btn btn-rounded btn-info" value="UPDATE">
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
