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


                <div class="col-12">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">All Products</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Product Name English</th>
                                        <th>Category Name Arabic</th>
                                        <th>Product Price </th>
                                        <th>Quantity </th>
                                        <th>Discount </th>
                                        <th>Status </th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>


                                    @foreach($products as $product)
                                        <tr>

                                            <td><img src="{{asset($product->product_thumbnail)}}" alt="" style="width: 60px;height: 50px"></td>
                                            <td>{{$product->product_name_en}}</td>
                                            <td>{{$product->product_name_ar}}</td>
                                            <td>{{$product->selling_price}}</td>
                                            <td>{{$product->product_qty}}</td>
                                            <td>

                                                @if($product->discount_price == NULL)
                                                    <span class="badge badge-pill badge-danger"> No Discount</span>
                                                @else
                                                    @php
                                                    $amount = ($product->selling_price - $product->discount_price);
                                                    $discount = ($amount/$product->selling_price)*100;
                                                    @endphp
                                                    <span class="badge badge-pill badge-danger">{{ round($discount) .'%'}}</span>

                                                @endif
                                            </td>
                                            <td>
                                                @if($product->status == 1)
                                                    <span class="badge badge-pill badge-success"> Active</span>
                                                @else
                                                    <span class="badge badge-pill badge-danger"> Inactive</span>

                                                @endif
                                            </td>
                                            <td width="30%">
                                                <a href="{{ route('product.edit',$product->id) }}" class="btn btn-primary" title="Product Details Data"><i class="fa fa-eye"></i> </a>
                                                <a href="{{route('product.edit',$product->id)}}" class="btn btn-info mb-5" title="Edit Data" > <i class="fa fa-pencil"></i></a>
                                                <a href="{{route('product.delete',$product->id)}}"  class="btn btn-danger mb-5" id="delete" title="Delete Data"><i class="fa fa-trash"></i></a>

                                                @if($product->status == 1)
                                                    <a href="{{ route('product.inactive',$product->id) }}" class="btn btn-success" title="Active Now"><i class="fa fa-arrow-up"></i> </a>
                                                @else
                                                    <a href="{{ route('product.active',$product->id) }}" class="btn btn-danger" title="inactive Now"><i class="fa fa-arrow-down"></i> </a>

                                                @endif

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
            </div>
        </section>
    </div>
@endsection
