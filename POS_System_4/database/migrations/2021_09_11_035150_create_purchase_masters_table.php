<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchaseMastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_masters', function (Blueprint $table) {
            $table->id();
            $table->string('purchase_code')->nullable();
            $table->unsignedBigInteger('supplier_id');
            $table->double('grand_total', 10, 2);
            $table->double('paid_amount', 10, 2);
            $table->double('due_amount', 10, 2);
            $table->text('note')->nullable();
            // $table->foreign('supplier_id')->references('id')->on('suppliers');
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
        Schema::dropIfExists('purchase_masters');
    }
}
