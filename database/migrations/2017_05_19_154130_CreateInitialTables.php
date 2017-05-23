<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInitialTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   
        DB::beginTransaction();

        try {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('slug');
            $table->timestamps();
        });
        /*
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('description');
            $table->integer('price');
            $table->string('preview_photo');
            $table->integer('category_id')->index()->unsigned();
            $table->integer('brand_id')->index()->unsigned();            
            $table->string('slug');
            $table->timestamps();
        });
        */
        Schema::create('brands', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('slug');
            $table->timestamps();
        });

        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->text('description')->nullable();
            $table->decimal('price');
            $table->string('preview_photo');
            $table->unsignedInteger('category_id');
            $table->unsignedInteger('brand_id');
            $table->string('slug');
            $table->timestamps();
            
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('restrict');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('restrict');
        });

        
        /*
        Schema::create('images', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id')->index()->unsigned();
            $table->integer('user_id')->index()->unsigned();
            $table->string('title')->index();
            $table->string('description')->index();
            $table->string('cover_photo');
            $table->timestamps();
        });
        */

        Schema::create('images', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('product_id');
            $table->string('path');
            $table->timestamps();
            
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });

            DB::commit();
        } catch (PDOException $e) {
            DB::rollBack();
            $this->down();
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('categories');
        Schema::drop('products');
        Schema::drop('brands');
        Schema::drop('images');
    }
}
