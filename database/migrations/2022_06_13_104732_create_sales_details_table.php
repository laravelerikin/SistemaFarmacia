<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales_details', function (Blueprint $table) {
            $table->id('id_sale_detail');
            $table->unsignedBigInteger('id_sale');
            $table->unsignedBigInteger('id_product');
            $table->decimal('price', 15, 2);
            $table->integer('subtotal');
            $table->tinyInteger('state');
            $table->timestamps();
            $table->foreign('id_product')->references('id_product')->on('products')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_sale')->references('id_sale')->on('sales')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sales_details');
    }
}
