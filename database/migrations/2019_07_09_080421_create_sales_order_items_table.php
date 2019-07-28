<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesOrderItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales_order_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('order_id')->unsigned();
            $table->bigInteger('product_id')->unsigned();
            $table->decimal('quantity');
            $table->decimal('price');
            $table->decimal('tax_value');
            $table->decimal('discount');
            $table->decimal('total');
            $table->string('state')->nullable();
            $table->string('status')->default('UN-ACTIVE');
            $table->timestamps();
            $table->softDeletes();
            $table->by_how();


            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('order_id')->references('id')->on('sales_orders');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sales_items');
    }
}
