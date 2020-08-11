<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblShipingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_shiping', function (Blueprint $table) {
            $table->increments('shiping_id');
            $table->string('shiping_mail');
            $table->string('shiping_first_name');
            $table->string('shiping_last_name');
            $table->string('shiping_address');
            $table->string('shiping_mobile_number');
            $table->string('shiping_city');
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
        Schema::dropIfExists('tbl_shiping');
    }
}
