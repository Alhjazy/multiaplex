<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchaseOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('supplier_id')->unsigned();
            $table->bigInteger('employee_id')->unsigned();
            $table->bigInteger('branch_id')->unsigned();
            $table->date('date');
            $table->date('required_date');
            $table->date('shipped_date');
            $table->string('type');
            $table->string('status')->default('UN-ACTIVE');
            $table->timestamps();
            $table->softDeletes();
            $table->by_how();

            $table->foreign('supplier_id')->references('id')->on('suppliers');
            $table->foreign('employee_id')->references('id')->on('employees');
            $table->foreign('branch_id')->references('id')->on('branches');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('purchase_orders');
    }
}
