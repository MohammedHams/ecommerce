<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubSubcategory extends Model
{
    protected $fillable = [
        'category_id',
        'subcategory_id',
        'sub_subcategory_name_en',
        'sub_subcategory_name_ar',
    ];

    public function category(){
        return  $this->belongsTo(Category::class,'category_id','id');
    }
    public function subCategory(){
        return  $this->belongsTo(SubCategory::class,'subcategory_id','id');
    }

}
