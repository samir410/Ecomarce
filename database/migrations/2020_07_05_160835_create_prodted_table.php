<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProdtedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tabl_product', function (Blueprint $table) {
            $table->increments('product_id');
            $table->string('product_name');
            $table->integer('catagory_id');
            $table->integer('manufacture_id');
            $table->longText('product_short_describtion');
            $table->longText('product_long_describtion');
            $table->float('product_price');
            $table->string('product_image');
            $table->string('product_quantity');
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
        Schema::dropIfExists('tabl_product');
    }
}
