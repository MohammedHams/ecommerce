@extends('admin.admin_master')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <div class="container-full">
            <!-- Content Header (Page header) -->
            <div class="content-header">

            </div>

            <!-- Main content -->
            <section class="content">

                <!-- Basic Forms -->
                <div class="box">
                    <div class="box-header with-border">
                        <h4 class="box-title">Add Product</h4>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col-12">
                                <form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Select Brand <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select  name="brand_id" value="selected"  class="form-control" aria-invalid="false">
                                                            <option value="" selected="" disabled="">Select Brand</option>
                                                            @foreach($brands as $brand)

                                                                <option value="{{$brand->id}}" >{{$brand->brand_name_en}}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('brand_id')
                                                        <div class="text-danger">{{$message}}</div>
                                                        @enderror
                                                    </div>
                                                    <br>
                                                </div>

                                            </div>{{--end col 4--}}
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Select Category <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select  name="category_id" value="selected"  class="form-control" aria-invalid="false">
                                                            <option value="" selected="" disabled="">Select Category</option>
                                                            @foreach($categories as $category)

                                                                <option value="{{$category->id}}" >{{$category->category_name_en}}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('category_id')
                                                        <div class="text-danger">{{$message}}</div>
                                                        @enderror
                                                    </div>
                                                    <br>
                                                </div>
                                            </div>{{--end col 4--}}
                                            <div class="col-md-4">

                                                <div class="form-group">
                                                    <h5>Select SubCategory <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select  name="subcategory_id" value="selected"  class="form-control" aria-invalid="false">
                                                            <option value="" selected="" disabled="">Select Category</option>

                                                        </select>
                                                        @error('subcategory_id')
                                                        <div class="text-danger">{{$message}}</div>
                                                        @enderror
                                                    </div>
                                                    <br>
                                                </div>

                                            </div>
                                        </div>{{--end 1st row--}}
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Select SubSubCategory <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select  name="subsubcategory_id" value="selected"  class="form-control" aria-invalid="false">
                                                            <option value="" selected="" disabled="">Select sub subcategory</option>

                                                        </select>
                                                        @error('subsubcategory_id')
                                                        <div class="text-danger">{{$message}}</div>
                                                        @enderror
                                                    </div>
                                                    <br>
                                                </div>

                                            </div>{{--end col 4--}}
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Product Name En <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="product_name_en" class="form-control" required data-validation-required-message="This field is required"> </div>
                                                    @error('product_name_en')
                                                    <div class="text-danger">{{$message}}</div>
                                                    @enderror
                                                </div>
                                            </div>{{--end col 4--}}
                                            <div class="col-md-4">

                                                <div class="form-group">
                                                    <h5>Product Name Ar <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="product_name_ar" class="form-control" required data-validation-required-message="This field is required">
                                                        @error('product_name_ar')
                                                        <div class="text-danger">{{$message}}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                            </div>
                                        </div>{{--end 2nd row--}}
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <div class="form-group">
                                                            <h5>Product Code <span class="text-danger">*</span></h5>
                                                            <div class="controls">
                                                                <input type="text" name="product_code" class="form-control" required data-validation-required-message="This field is required"> </div>
                                                            @error('product_code')
                                                            <div class="text-danger">{{$message}}</div>
                                                            @enderror
                                                        </div>
                                                        @error('product_code')
                                                        <div class="text-danger">{{$message}}</div>
                                                        @enderror
                                                    </div>
                                                    <br>
                                                </div>

                                            </div>{{--end col 4--}}
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Product Quantity <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="product_qty" class="form-control" required data-validation-required-message="This field is required"> </div>
                                                    @error('product_qty')
                                                    <div class="text-danger">{{$message}}</div>
                                                    @enderror
                                                </div>
                                            </div>{{--end col 4--}}
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Product Tags En <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="products_tags_en" class="form-control" value="Loren,Ipsum," data-role="tagsinput" required> </div>
                                                    @error('product_tags_en')
                                                    <div class="text-danger">{{$message}}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>{{--end 3r drow--}}
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Product Tags Ar <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="products_tags_ar" class="form-control" value="Loren,Ipsum," data-role="tagsinput"> </div>
                                                    @error('product_tags_ar')
                                                    <div class="text-danger">{{$message}}</div>
                                                    @enderror
                                                </div>

                                            </div>{{--end col 4--}}
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Product size En <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="product_size_en" class="form-control" value="small,medium,large" data-role="tagsinput" required> </div>
                                                    @error('product_size_en')
                                                    <div class="text-danger">{{$message}}</div>
                                                    @enderror
                                                </div>
                                            </div>{{--end col 4--}}
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Product Size Ar <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="product_size_ar" class="form-control" value="صغير,وسط,كبير" data-role="tagsinput"> </div>
                                                    @error('product_size_ar')
                                                    <div class="text-danger">{{$message}}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>{{--end 4th row--}}
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Product Color En <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="product_color_en" class="form-control" value="Black,White" data-role="tagsinput" > </div>
                                                    @error('product_color_en')
                                                    <div class="text-danger">{{$message}}</div>
                                                    @enderror
                                                </div>

                                            </div>{{--end col 4--}}
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Product Color Ar <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="product_color_ar" class="form-control" value="أبيض , أسود" data-role="tagsinput" > </div>
                                                    @error('product_color_ar')
                                                    <div class="text-danger">{{$message}}</div>
                                                    @enderror
                                                </div>
                                            </div>{{--end col 4--}}
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Product Selling Price <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="selling_price" class="form-control" > </div>
                                                    @error('selling_price')
                                                    <div class="text-danger">{{$message}}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>{{--end 5th row--}}
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Product Discount Price <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="discount_price" class="form-control" > </div>
                                                    @error('discount_price')
                                                    <div class="text-danger">{{$message}}</div>
                                                    @enderror
                                                </div>


                                            </div>{{--end col 4--}}
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Main Thumbnail <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="file" name="product_thumbnail" class="form-control" onchange="mainThamUrl(this)"> </div>
                                                    <img id="mainThmb" src="" >
                                                    @error('product_thumbnail')
                                                    <div class="text-danger">{{$message}}</div>
                                                    @enderror
                                                </div>                                            </div>{{--end col 4--}}
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Product Multiple Image <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="file" name="multi_img[]" class="form-control" multiple="" id="multiImg"> </div>
                                                    <div class="row" id="preview_img"></div>
                                                    @error('multi_img')
                                                    <div class="text-danger">{{$message}}</div>
                                                    @enderror
                                                </div>                                            </div>{{--end col 4--}}
                                            </div>{{--end 6th row--}}
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Short Description English <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="short_desc_en" class="form-control" > </div>
                                                    @error('short_desc_en')
                                                    <div class="text-danger">{{$message}}</div>
                                                    @enderror
                                                </div>


                                            </div>{{--end col 6--}}
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Short Description Arabic <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="short_desc_ar" class="form-control" > </div>
                                                    @error('short_desc_ar')
                                                    <div class="text-danger">{{$message}}</div>
                                                    @enderror
                                                </div>
                                        </div>{{--end 7th row--}}

                                    </div>{{--end 7th row--}}
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Long Description English <span class="text-danger">*</span></h5>
                                                    <div class="controls">
<textarea id="editor1" name="long_desc_en" rows="10" cols="80" style="visibility: hidden; display: none;">This is my textarea to be replaced with CKEditor.</textarea>
                                                        @error('long_desc_en')
                                                    <div class="text-danger">{{$message}}</div>
                                                    @enderror
                                                </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Long Description Arabic <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <textarea id="editor2" name="long_desc_ar" rows="10" cols="80" style="visibility: hidden; display: none;" >This is my textarea to be replaced with CKEditor.</textarea>
                                                        @error('long_desc_en')
                                                        <div class="text-danger">{{$message}}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>


                                            </div>{{--end row 8th--}}
                                        <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <fieldset>
                                                    <input type="checkbox" id="checkbox_2" name="hot_deals"  value="1" >
                                                    <label for="checkbox_2">Hot Deals</label>
                                                </fieldset></div>
                                            <fieldset>
                                                <input type="checkbox" id="checkbox_3" name="featured" value="1" >
                                                <label for="checkbox_3">Featured</label>
                                            </fieldset>

                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                    <fieldset>
                                                        <input type="checkbox" id="checkbox_4" name="special_offer"  value="1" >
                                                        <label for="checkbox_4">Special Offer</label>
                                                    </fieldset></div>
                                                    <fieldset>
                                                        <input type="checkbox" id="checkbox_5" name="special_deals" value="1">
                                                        <label for="checkbox_5">Special Deals</label>
                                                    </fieldset>

                                        </div>
                                    </div>{{--end row 9th--}}
                                    </div>
                                    <div class="text-xs-right">
                                        <br>
                                        <input type="submit" class="btn btn-rounded btn-info" value="Update Product">
                                    </div>


                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
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
                                $.each(data, function(key, value){
                                    $('select[name="subcategory_id"]').append('<option value="'+ value.id +'">' + value.subcategory_name_en + '</option>');
                                });
                            },
                        });
                    } else {
                        alert('danger');
                    }
                });
                 $('select[name="subcategory_id"]').on('change', function(){
                    var subcategory_id = $(this).val();
                    if(subcategory_id) {
                        $.ajax({
                            url: "{{  url('admin/category/subcategory/sub/ajax') }}/"+subcategory_id,
                            type:"GET",
                            dataType:"json",
                            success:function(data) {

                                $('select[name="subsubcategory_id"]').append('<option value="" selected="" disabled="">Select sub subcategory</option>');
                                $('select[name="subsubcategory_id"]').empty();
                                $.each(data, function(key, value){
                                    $('select[name="subsubcategory_id"]').append('<option value="'+ value.id +'">' + value.sub_subcategory_name_en + '</option>');
                                });
                            },
                        });
                    } else {
                        alert('danger');
                    }
                });

            });
        </script>
    <script type="text/javascript">
        function mainThamUrl(input){
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e){
                    $('#mainThmb').attr('src',e.target.result).width(80).height(80);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
    <script>

        $(document).ready(function(){
            $('#multiImg').on('change', function(){ //on file input change
                if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
                {
                    var data = $(this)[0].files; //this file data

                    $.each(data, function(index, file){ //loop though each file
                        if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){ //check supported file type
                            var fRead = new FileReader(); //new filereader
                            fRead.onload = (function(file){ //trigger function on successful read
                                return function(e) {
                                    var img = $('<img/>').addClass('thumb').attr('src', e.target.result) .width(80)
                                        .height(80); //create image element
                                    $('#preview_img').append(img); //append image to output element
                                };
                            })(file);
                            fRead.readAsDataURL(file); //URL representing the file's data.
                        }
                    });

                }else{
                    alert("Your browser doesn't support File API!"); //if File API is absent
                }
            });
        });

    </script>
    @endsection
