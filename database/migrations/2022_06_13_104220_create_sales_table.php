<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id('id_sale');
            $table->string('client', 35);
            $table->string('nit', 35);
            $table->decimal('total', 15, 2);
            $table->decimal('decimal', 15, 2);
            $table->decimal('cambio', 15, 2);            
            $table->tinyInteger('state');
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
        Schema::dropIfExists('sales');
    }
}
