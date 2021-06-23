<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('category_id')->index()->default(0);
            $table->bigInteger('brand_id')->index()->default(0);
            $table->string('name',100)->unique();
            $table->string('slug',120)->index();
            $table->string('avatar',120);
            $table->string('icon',120)->nullable();
            $table->string('image_hot',120)->nullable();
            $table->text('image_detail')->nullable();
            $table->text('image_carousel')->nullable();
            $table->integer('price')->default(0);
            $table->tinyInteger('discount')->default(0)->nullable();
            $table->string('gift',100)->nullable();
            $table->string('property')->nullable();
            $table->boolean('hot')->default(0);
            $table->tinyInteger('active')->default(1)->index();
            $table->text('description')->nullable();
            $table->longText('content')->nullable();
            $table->string('title_seo')->nullable();
            $table->string('description_seo')->nullable();
            $table->string('keyword_seo')->nullable();
            $table->integer('view')->default(0)->nullable();
            $table->string('created_by')->nullable();
            $table->string('modified_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
