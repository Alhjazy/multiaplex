<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesShippingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales_shippings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('sales_order_id')->unsigned();
            $table->string('company_name');
            $table->string('tracker');
            $table->string('from');
            $table->string('to');
            $table->decimal('cost');
            $table->text('state');
            $table->text('remarks')->nullable();
            $table->string('status')->default('ACTIVE');
            $table->timestamps();
            $table->softDeletes();
            $table->by_how();

            $table->foreign('sales_order_id')->references('id')->on('sales_orders');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sales_shippings');
    }
}
