<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFoodInOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('foodin_order', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('ORDER_ID');
            $table->integer('FID');
            $table->integer('QUANTITY');
            $table->longtext('DESCRIPT')->nullable;
            $table->foreign('ORDER_ID')->references('ID')->on('food_orders')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('foodin_order');
    }
}
