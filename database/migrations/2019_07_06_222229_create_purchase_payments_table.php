<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchasePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_payments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('pord_id')->unsigned();
            $table->bigInteger('supplier_id')->unsigned();
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

            $table->foreign('pord_id')->references('id')->on('purchase_orders');
            $table->foreign('supplier_id')->references('id')->on('suppliers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('purchase_payments');
    }
}
