<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\MultiImg;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\SubSubcategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    public function AddProduct()
    {
            $categories = Category::latest()->get();
            $brands = Brand::latest()->get();
            return view('backend.product.product_add',compact('categories','brands'));
    }
public function productStore(Request $request){
    $image = $request->file('product_thumbnail');
    $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
    Image::make($image)->resize(917,1000)->save('upload/products/thumbnail/'.$name_gen);
    $save_url = 'upload/products/thumbnail'.'/'.$name_gen;

            $product_id=Product::insertGetId([

                    'brand_id'=>$request->brand_id,
                    'category_id'=>$request->category_id,
                    'subcategory_id'=>$request->subcategory_id,
                    'subsubcategory_id'=>$request->subcategory_id,
                    'product_name_en'=>$request->product_name_en,
                    'product_name_ar'=>$request->product_name_ar,
                    'product_code'=>$request->product_code,
                    'product_qty'=>$request->product_qty,
                    'products_tags_en'=>$request->products_tags_en,
                    'products_tags_ar'=>$request->products_tags_ar,
                    'product_size_en'=>$request->product_size_en,
                    'product_size_ar'=>$request->product_size_ar,
                    'product_color_en'=>$request->product_color_en,
                    'product_color_ar'=>$request->product_color_ar,
                    'selling_price'=>$request->selling_price,
                    'discount_price'=>$request->discount_price,
                    'short_desc_en'=>$request->short_desc_en,
                    'short_desc_ar'=>$request->short_desc_ar,
                    'long_desc_en'=>$request->long_desc_en,
                    'long_desc_ar'=>$request->long_desc_ar,
                    'product_thumbnail'=>$save_url,
                    'hot_deals'=>$request->hot_deals,
                    'featured'=>$request->featured,
                    'special_offer'=>$request->special_offer,
                    'special_deals'=>$request->special_deals,
                    'status'=>1,
                    'created_at'=>Carbon::now(),


            ]);
            //////////multiimage_uploads////////////////
    $images = $request->file('multi_img');
    foreach ($images as $img) {
        $make_name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
        Image::make($img)->resize(917,1000)->save('upload/products/multi_image/'.$make_name);
        $uploadPath = 'upload/products/multi_image/'.$make_name;
                MultiImg::insert([
                    'product_id' =>$product_id,
                    'photo_name'=>$uploadPath,
                    'created_at'=>Carbon::now(),

                ]);
                }
                    $notification = array(
                        'message'=>'Product Inserted Successfully',
                        'alert-type'=>'success'
                    );
                    return redirect()->route('product.manage')->with($notification);




}
                public function manageProduct(){
                               $products =  Product::latest()->get();
                               return view('backend.product.product_view',compact('products'));
                }
                public function productEdit($id){
                    $multiImgs = MultiImg::where('product_id',$id)->get();
                    $categories = Category::latest()->get();
                    $brands = Brand::latest()->get();
                    $subcategories = SubCategory::latest()->get();
                    $subsubcategories = SubSubcategory::latest()->get();
                    $products =  Product::findOrFail($id);

                    return view('backend.product.product_edit',compact('categories','brands','subcategories','subsubcategories','products','multiImgs'));

                }
                public function productUpdate(Request $request){
                    $product_id = $request->id;
                     Product::findOrFail($product_id)->update([

                         'brand_id'=>$request->brand_id,
                         'category_id'=>$request->category_id,
                         'subcategory_id'=>$request->subcategory_id,
                         'subsubcategory_id'=>$request->subcategory_id,
                         'product_name_en'=>$request->product_name_en,
                         'product_name_ar'=>$request->product_name_ar,
                         'product_code'=>$request->product_code,
                         'product_qty'=>$request->product_qty,
                         'products_tags_en'=>$request->products_tags_en,
                         'products_tags_ar'=>$request->products_tags_ar,
                         'product_size_en'=>$request->product_size_en,
                         'product_size_ar'=>$request->product_size_ar,
                         'product_color_en'=>$request->product_color_en,
                         'product_color_ar'=>$request->product_color_ar,
                         'selling_price'=>$request->selling_price,
                         'discount_price'=>$request->discount_price,
                         'short_desc_en'=>$request->short_desc_en,
                         'short_desc_ar'=>$request->short_desc_ar,
                         'long_desc_en'=>$request->long_desc_en,
                         'long_desc_ar'=>$request->long_desc_ar,
                         'hot_deals'=>$request->hot_deals,
                         'featured'=>$request->featured,
                         'special_offer'=>$request->special_offer,
                         'special_deals'=>$request->special_deals,
                         'status'=>1,
                         'created_at'=>Carbon::now(),


                     ]);
                    $notification = array(
                        'message'=>'Product Updated Successfully',
                        'alert-type'=>'success'
                    );
                    return redirect()->route('product.manage')->with($notification);

                }
                public function multiImageUpdate(Request $request){
                            $imgs = $request->multi_img;
                            foreach ($imgs as $id => $img){
                            $imgDel= MultiImg::findOrFail($id);
                            unlink($imgDel->photo_name);
                            $make_name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
                            Image::make($img)->resize(917,1000)->save('upload/products/multi_image/'.$make_name);
                            $uploadPath = 'upload/products/multi_image/'.$make_name;
                            MultiImg::where('id',$id)->update([
                                'photo_name' =>$uploadPath,
                                'updated_at'=>Carbon::now(),
                            ]);
                        }
                        $notification = array(
                            'message'=>'Product Images Updated Successfully',
                            'alert-type'=>'success'
                        );
                        return redirect()->back()->with($notification);


                    }

    public function thumbUpdate(Request $request){

            $pro_id = $request->id;
            $image = $request->file('product_thumbnail');
            $oldImage = $request->old_img;
            unlink($oldImage);
         $make_name = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
         Image::make($image)->resize(917,1000)->save('upload/products/thumbnail/'.$make_name);
         $uploadPath = 'upload/products/thumbnail/'.$make_name;
            Product::findOrFail($pro_id)->update([
                'product_thumbnail' => $uploadPath,
                'updated_at'=>Carbon::now(),

            ]);
        $notification = array(
            'message'=>'Product Thumbnail Updated Successfully',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);


    }
    public function multiImgDelete($id){
        $oldImg = MultiImg::findOrFail($id);
        unlink($oldImg->photo_name);
         MultiImg::findOrFail($id)->delete();
        $notification = array(
            'message'=>'Product Image Deleted Successfully',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);


    }
    public function ProductInactive($id){
        Product::findOrFail($id)->update(['status' => 0]);
        $notification = array(
            'message' => 'Product Inactive',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }


    public function ProductActive($id){
        Product::findOrFail($id)->update(['status' => 1]);
        $notification = array(
            'message' => 'Product Active',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }

    public function productDelete($id){
        $product = Product::findOrFail($id);
        unlink($product->product_thumbnail);
        Product::findOrFail($id)->delete();

        $images = MultiImg::where('product_id',$id)->get();
        foreach ($images as $img) {
            unlink($img->photo_name);
            MultiImg::where('product_id',$id)->delete();
        }

        $notification = array(
            'message' => 'Product Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);


    }

}
