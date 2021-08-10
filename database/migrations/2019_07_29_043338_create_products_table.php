<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('supplier_id')->unsigned();
            $table->integer('postalcode_id')->unsigned();
            $table->string('product_id',100);
            $table->string('product_name');
            $table->text('description')->nullable();
            $table->string('tariff_description',1000)->nullable();
            $table->string('type')->nullable();
            $table->integer('contract_duration');
            $table->string('service_level_payment')->nullable();
            $table->string('service_level_invoicing')->nullable();
            $table->string('service_level_contact')->nullable();
            $table->string('customer_condition')->nullable();
            $table->string('origin')->nullable();
            $table->string('pricing_type')->nullable();
            $table->integer('green_percentage')->nullable();
            $table->string('subscribe_url',300)->nullable();
            $table->string('terms_url',300)->nullable();
            $table->boolean('ff_pro_rata')->nullable();
            $table->integer('inv_period')->nullable();
            $table->json('validity_period')->nullable();
            $table->json('totals')->nullable();
            $table->json('breakdown')->nullable();   
            $table->tinyInteger('featured')->default(0)->comment('0:not featured; 1:featured;');
            $table->timestamps();
            
            $table->foreign('supplier_id')->references('id')->on('suppliers')->onDelete('cascade');
            $table->foreign('postalcode_id')->references('id')->on('postalcode')->onDelete('cascade');
        }); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function(Blueprint $table) {
            $table->dropForeign(['supplier_id']);
            $table->dropForeign(['postalcode_id']);
        });
        
        Schema::dropIfExists('products');
    }
}
