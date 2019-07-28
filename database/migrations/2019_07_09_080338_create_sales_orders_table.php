<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales_orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('customer_id')->unsigned();
            $table->bigInteger('location_id')->unsigned();
            $table->bigInteger('employee_id')->unsigned()->nullable();
            $table->string('reference');
            $table->date('issue_date');
            $table->date('expiry_date');
            $table->date('shipped_date');
            $table->date('due_date');
            $table->decimal('total_amount');
            $table->decimal('total_tax_amount');
            $table->decimal('total_qty');
            $table->decimal('total_discount_amount');
            $table->decimal('total_items');
            $table->decimal('total_balance');
            $table->decimal('total_due');
            $table->decimal('outstanding_balance');
            $table->string('description');
            $table->string('remark');
            $table->string('type');
            $table->string('state');
            $table->string('status')->default('UN-ACTIVE');
            $table->timestamps();
            $table->softDeletes();
            $table->by_how();

            $table->foreign('customer_id')->references('id')->on('customers');
            $table->foreign('employee_id')->references('id')->on('employees');
            $table->foreign('location_id')->references('id')->on('locations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sales_orders');
    }
}
