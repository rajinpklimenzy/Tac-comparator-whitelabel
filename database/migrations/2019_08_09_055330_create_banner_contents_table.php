<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBannerContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banner_contents', function (Blueprint $table) {
            $table->increments('id');
            $table->string('page_name');
            $table->text('banner_content_in_english');
            $table->text('banner_content_in_NL');
            $table->text('banner_content_in_FR');
            $table->string('banner_image')->nullable();
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
        Schema::dropIfExists('banner_contents');
    }
}

        