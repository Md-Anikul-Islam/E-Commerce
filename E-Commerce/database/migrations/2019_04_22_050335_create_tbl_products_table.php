<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_products', function (Blueprint $table) {
            $table->bigIncrements('products_id');
            $table->string('products_name');
            $table->integer('category_id');
            $table->integer('brands_id');
            $table->longText('products_description');
            $table->float('products_price');
            $table->string('products_image');
            $table->string('products_size');
            $table->string('products_color');
            $table->integer('publication_status');
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
        Schema::dropIfExists('tbl_products');
    }
}
