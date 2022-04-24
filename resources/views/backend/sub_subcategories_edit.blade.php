@extends('admin.admin_master')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <div class="container-full">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                                <li class="breadcrumb-item" aria-current="page">Tables</li>
                                <li class="breadcrumb-item active" aria-current="page">Data Tables</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main content -->
        <section class="content">
            <div class="row">


                <!-- /.col -->

                {{-------------------Add Category --------------------}}

                <div class="col-12">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Add SubCategory</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <form action="{{route('subsubcategory.update')}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$subsubcategories->id}}">
                                    <div class="form-group">
                                        <h5>Select Category <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select  name="category_id" value="selected" required="" class="form-control" aria-invalid="false">
                                                <option value="" selected="" disabled="">Select Category</option>
                                                @foreach($category as $category)

                                                    <option value="{{$category->id}}" {{!empty($subsubcategories->category_id) && $category->id==$subsubcategories->category_id ?'selected': ''}}>{{$category->category_name_en}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <br>
                                    </div>
                                    <div class="form-group">
                                        <h5>SubCategory Select <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="subcategory_id" class="form-control"  >
                                                <option value="" selected="" disabled="">Select SubCategory</option>
                                                @foreach($subcategories as $subcategory)

                                                    <option value="{{$subcategory->id}}" {{!empty($subsubcategories->subcategory_id) && $subcategory->id==$subsubcategories->subcategory_id ?'selected': ''}}>{{$subcategory->subcategory_name_en}}</option>
                                                @endforeach

                                            </select>
                                            @error('subcategory_id')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <h5>Sub-SubCategory Name English <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" value="{{$subsubcategories->sub_subcategory_name_en}}" name="sub_subcategory_name_en"  class="form-control" >

                                            @error('sub_subcategory_name_en')
                                            <div class="text-danger">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Sub-SubCategory Name Arabic <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" value="{{$subsubcategories->sub_subcategory_name_ar}}" name="sub_subcategory_name_ar"  class="form-control" >
                                            @error('sub_subcategory_name_ar')
                                            <div class="text-danger">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="text-xs-right">
                                        <input type="submit" class="btn btn-rounded btn-info" value="UPDATE Category">
                                    </div>



                                </form>

                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->

                    <!-- /.box -->
                </div>

            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->

    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $('select[name="category_id"]').on('change', function(){
                var category_id = $(this).val();
                if(category_id) {
                    $.ajax({
                        url: "{{  url('admin/category/subcategory/ajax') }}/"+category_id,
                        type:"GET",
                        dataType:"json",
                        success:function(data) {
                            var d =$('select[name="subcategory_id"]').empty();
                            $.each(data, function(key, value){
                                $('select[name="subcategory_id"]').append('<option value="'+ value.id +'">' + value.subcategory_name_en + '</option>');
                            });
                        },
                    });
                } else {
                    alert('danger');
                }
            });
        });
    </script>
@endsection
