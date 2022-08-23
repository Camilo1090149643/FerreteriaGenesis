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
            $table->id();
            $table->unsignedBigInteger('client_id');
            $table->foreign('cliente_id')->references('id')->on('clients');
            $table->unsignedBigInteger('user_id');
            $table->foreing('user_id')->references('id')->on('users');
            $table->datetime('sale_date');
            $table->decimal('impuesto');
            $table->decimal('total');
            $table->emun('status',['VALID','CANCELED'])->default('VALID');
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
