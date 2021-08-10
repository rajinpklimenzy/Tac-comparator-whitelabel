<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiceLimitationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_limitations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('SL_payment')->nullable();
            $table->string('SL_invoice')->nullable();
            $table->string('SL_contact')->nullable();
            $table->string('NL_shortdescription')->nullable();
            $table->string('NL_description')->nullable();
            $table->string('FR_shortdescription')->nullable();
            $table->string('FR_description')->nullable();
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
        Schema::dropIfExists('service_limitations');
    }
}
