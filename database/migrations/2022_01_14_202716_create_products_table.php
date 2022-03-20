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
             $table->id();
    $table->string('title_en');
    $table->string('title_ar');
    $table->string('product_image')->nullable();
    $table->text('description_en');
    $table->text('description_ar');
    $table->float('price');
    $table->integer('quantity');
    $table->unsignedBigInteger('category_id');
    $table->foreign('category_id')->references('id')->on('categories');
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
