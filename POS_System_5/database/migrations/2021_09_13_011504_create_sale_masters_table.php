<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSaleMastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sale_masters', function (Blueprint $table) {
            $table->id();
            $table->string('code')->nullable();
            $table->integer('customer_id');
            $table->double('total_amount',10, 2);
            $table->string('discount_perchantage')->nullable();
            $table->double('discount_amount',10, 2)->nullable();
            $table->double('extra_charge',10, 2)->nullable();
            $table->double('grand_total',10, 2);
            $table->double('paid_amount',10, 2)->nullable();
            $table->double('due_amount',10, 2)->nullable();
            $table->text('note')->nullable();
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
        Schema::dropIfExists('sale_masters');
    }
}
