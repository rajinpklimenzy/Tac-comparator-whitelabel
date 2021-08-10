<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTooltipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tooltips', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug');
            $table->string('field_name')->nullable();
            $table->string('NL_tooltip')->nullable();
            $table->string('FR_tooltip')->nullable();
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
        Schema::dropIfExists('tooltips');
    }
}
