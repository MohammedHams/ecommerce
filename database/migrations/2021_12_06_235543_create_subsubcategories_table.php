<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubsubcategoriesTable extends Migration
{
    public function up()
    {
        Schema::create('sub_subcategories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('category_id');
            $table->integer('subcategory_id');
            $table->string('sub_subcategory_name_en');
            $table->string('sub_subcategory_name_ar');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('subsubcategories');
    }
}
