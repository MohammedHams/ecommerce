<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class CategoryController extends Controller
{

        public function categoryView()
    {
        $category = Category::latest()->get();
        return view('backend.category_view',compact('category'));
    }
        public function categoryStore(Request $request)
    {
        $request->validate([
            'category_name_en'=>'required|max:225|unique:categories',
            'category_name_ar'=>'required|max:225|unique:categories',
        ]);
        Category::insert([
            'category_name_en'=>$request->category_name_en,
            'category_name_ar'=>$request->category_name_ar,
            'category_icon'=>$request->category_icon,
        ]);
        $notification = array(
            'message'=>'Category Added Successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('category.view')->with($notification);
    }
        public function categoryEdit(Request $request,$id){
        $category = Category::find($id);
        return view('backend.category_edit',compact('category'));

    }
        public function categoryUpdate(Request $request){

        $category_id = $request->id;
            Category::findOrFail($category_id)->update([
                'category_name_en'=>$request->category_name_en,
                'category_name_ar'=>$request->category_name_ar,
                'category_icon'=>$request->category_icon,
            ]);
            $notification = array(
                'message'=>'Category Updated Successfully',
                'alert-type'=>'success'
            );
            return redirect()->route('category.view')->with($notification);




        }


        public function categoryDelete($id){
        $category = Category::findOrFail($id);
        $category->delete();
        $notification = array(
            'message'=>'Category Deleted Successfully',
            'alert-type'=>'error'
        );

        return redirect()->route('category.view')->with($notification);
    }


}
