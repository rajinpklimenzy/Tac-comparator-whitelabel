<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGasCurrentsuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gas_currentsuppliers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('current_tariff')->nullable();
            $table->string('consumption')->nullable();
            $table->string('current_supplier')->nullable();
            $table->datetime('contract_date')->nullable();
            $table->timestamps();
            
            $table->foreign('user_id')->references('id')->on('user_logs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gas_currentsuppliers');
    }
}
