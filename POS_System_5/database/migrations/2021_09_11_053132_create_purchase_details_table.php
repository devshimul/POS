<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchaseDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pm_id');
            $table->unsignedBigInteger('product_id');
            $table->integer('product_qnt');
            $table->double('cost_price',10,2);
            $table->double('total_amount',10,2);
            $table->timestamps();
            $table->foreign('pm_id')->references('id')->on('purchase_masters')->onDelete('cascade');
            // $table->foreign('product_id')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('purchase_details');
    }
}
