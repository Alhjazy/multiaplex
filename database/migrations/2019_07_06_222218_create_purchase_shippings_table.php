<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchaseShippingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_shippings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('pord_id')->unsigned();
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

            $table->foreign('pord_id')->references('id')->on('purchase_orders');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('purchase_shippings');
    }
}
