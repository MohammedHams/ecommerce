<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubcategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{

        public function subCategoryView()
    {
        $category = Category::orderBy('category_name_en','ASC')->get();
        $subcategories = SubCategory::latest()->get();
        return view('backend.subcategory_view',compact('subcategories','category'));
    }
    public function subCategoryStore(Request $request)
    {
        $request->validate([
            'category_id'=>'required|max:225',
            'subcategory_name_en'=>'required|max:225|unique:sub_categories',
            'subcategory_name_ar'=>'required|max:225|unique:sub_categories',
        ]);
        SubCategory::insert([
            'category_id'=>$request->category_id,
            'subcategory_name_en'=>$request->subcategory_name_en,
            'subcategory_name_ar'=>$request->subcategory_name_ar,
        ]);
        $notification = array(
            'message'=>'SubCategory Added Successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('subcategory.view')->with($notification);
    }


    public function subCategoryEdit($id){
        $category = Category::orderBy('category_name_en','ASC')->get();
        $subcategories= SubCategory::findOrFail($id);
        return view('backend.subcategory_edit',compact('subcategories','category'));


    }
    public function subCategoryUpdate(Request $request){

        $subcategory_id =   $request->id;
        SubCategory::findOrFail($subcategory_id)
            ->update([
            'category_id'=>$request->category_id,
            'subcategory_name_en'=>$request->subcategory_name_en,
            'subcategory_name_ar'=>$request->subcategory_name_ar,
        ]);
        $notification = array(
            'message'=>'SubCategory Updated Successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('subcategory.view')->with($notification);

    }
    public function subCategoryDelete($id){

         SubCategory::findOrFail($id)->delete();
        $notification = array(
            'message'=>'SubCategory Deleted Successfully',
            'alert-type'=>'errorr'
        );
        return redirect()->route('subcategory.view')->with($notification);

    }
    //////////////////subsubCategory ///////////////
    public function subSubCategoryView()
    {
        $category = Category::orderBy('category_name_en','ASC')->get();
        $subsubcategories = SubSubcategory::latest()->get();
        return view('backend.sub_subcategory_view',compact('subsubcategories','category'));
    }
        public function getSubCategoryAjax($category_id){
                $subcat = SubCategory::where('category_id',$category_id)->orderBy('subcategory_name_en','ASC')->get();
                return json_encode($subcat);
        }
    public function subSubCategoryStore(Request $request)
    {
        $request->validate([
            'category_id'=>'required|max:225',
            'sub_subcategory_name_en'=>'required|max:225|unique:sub_subcategories',
            'sub_subcategory_name_ar'=>'required|max:225|unique:sub_subcategories',
        ]);
        SubSubcategory::insert([
            'category_id'=>$request->category_id,
            'subcategory_id'=>$request->subcategory_id,
            'sub_subcategory_name_en'=>$request->sub_subcategory_name_en,
            'sub_subcategory_name_ar'=>$request->sub_subcategory_name_ar,
        ]);
        $notification = array(
            'message'=>'Sub-SubCategory Added Successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('subsubcategory.view')->with($notification);
    }

    public function subSubCategoryEdit($id){
        $category = Category::orderBy('category_name_en','ASC')->get();
        $subcategories = SubCategory::orderBy('subcategory_name_en','ASC')->get();

        $subsubcategories= SubSubcategory::findOrFail($id);
        return view('backend.sub_subcategories_edit',compact('category','subcategories','subsubcategories'));

    }
public function subSubCategoryUpdate(Request $request){
    $sub_subcategory_id =   $request->id;
    SubSubcategory::findOrFail($sub_subcategory_id)
        ->update([
            'category_id'=>$request->category_id,
            'subcategory_id'=>$request->subcategory_id,
            'sub_subcategory_name_en'=>$request->sub_subcategory_name_en,
            'sub_subcategory_name_ar'=>$request->sub_subcategory_name_ar,
        ]);
    $notification = array(
        'message'=>'subSubCategory Updated Successfully',
        'alert-type'=>'success'
    );
    return redirect()->route('subsubcategory.view')->with($notification);


}
public function subSubCategoryDelete($id){


        SubSubcategory::findOrFail($id)->delete();
        $notification = array(
            'message'=>'subSubCategory Deleted Successfully',
            'alert-type'=>'error'
        );
        return redirect()->route('subsubcategory.view')->with($notification);



}
public function getSubSubCategoryAjax($subcategory_id){
    $subsubcat = SubSubcategory::where('subcategory_id',$subcategory_id)->orderBy('sub_subcategory_name_en','ASC')->get();
    return json_encode($subsubcat);

}

}
