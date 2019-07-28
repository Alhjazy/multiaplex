<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales_payments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('sales_order_id')->unsigned();
            $table->bigInteger('customer_id')->unsigned();
            $table->string('reference');
            $table->string('payment_account');
            $table->text('description')->nullable();
            $table->date('date');
            $table->decimal('amount');
            $table->decimal('outstanding-balance');
            $table->text('remarks')->nullable();
            $table->text('state');
            $table->string('status')->default('ACTIVE');
            $table->timestamps();
            $table->softDeletes();
            $table->by_how();

            $table->foreign('sales_order_id')->references('id')->on('sales_orders');
            $table->foreign('customer_id')->references('id')->on('customers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sales_payments');
    }
}
