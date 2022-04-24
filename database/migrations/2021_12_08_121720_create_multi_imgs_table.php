<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMultiImgsTable extends Migration
{
    public function up()
    {
        Schema::create('multi_imgs', function (Blueprint $table) {
            $table->id();
            $table->integer('product_id');
            $table->string('photo_name');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('multi_imgs');
    }
}
