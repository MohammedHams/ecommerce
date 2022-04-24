@extends('admin.admin_master')
@section('content')
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


                    <div class="col-8">

                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">All Brands</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th>Brand Name En</th>
                                            <th>Brand Name Ar</th>
                                            <th>Brand Image</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>


@foreach($brands as $item)
                                        <tr>

                                            <td>{{$item->brand_name_en}}</td>
                                            <td>{{$item->brand_name_ar}}</td>
                                            <td><img src="{{asset($item->brand_image)}}" style="width: 70px;height: 70px"></td>
                                            <td>
                                                <a href="{{route('brands.edit',$item->id)}}" class="btn btn-info mb-5" title="Edit Data" > <i class="fa fa-pencil"></i></a>
                                                <a href="{{route('brands.delete',$item->id)}}"  class="btn btn-danger mb-5" id="delete" title="Delete Data"><i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
@endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->

                        <!-- /.box -->
                    </div>
                    <!-- /.col -->

                    {{-------------------Add Brand --------------------}}

                    <div class="col-4">

                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Add Brand</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                    <form action="{{route('brands.store')}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                            <div class="form-group">
                                                            <h5>Brand Name English <span class="text-danger">*</span></h5>
                                                            <div class="controls">
                                                                <input type="text" name="brand_name_en"  class="form-control" >
                                                            @error('brand_name_en')
                                                                <div class="text-danger">{{$message}}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <h5>Brand Name Arabic <span class="text-danger">*</span></h5>
                                                            <div class="controls">
                                                                <input type="text" name="brand_name_ar"  class="form-control" >
                                                                @error('brand_name_ar')
                                                                <div class="text-danger">{{$message}}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <h5>Brand Image <span class="text-danger">*</span></h5>
                                                            <div class="controls">
                                                                <input  type="file" name="brand_image"  class="form-control" >
                                                                @error('brand_image')
                                                                <div class="text-danger">{{$message}}</div>@enderror

                                                            </div>
                                                            <br>
                                            <div class="text-xs-right">
                                                <input type="submit" class="btn btn-rounded btn-info" value="ADD Brand">
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

                </div>
                <!-- /.row -->
            </section>
            <!-- /.content -->

        </div>


@endsection
