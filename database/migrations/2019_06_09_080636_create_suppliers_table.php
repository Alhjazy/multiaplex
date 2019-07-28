<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('staff_name');
            $table->string('staff_id');
            $table->string('staff_phone');
            $table->string('staff_telephone');
            $table->string('staff_email');
            $table->string('company_name');
            $table->string('company_city');
            $table->string('company_street');
            $table->string('company_email');
            $table->string('company_address_line1');
            $table->string('company_address_line2');
            $table->string('company_zip_code');
            $table->string('company_phone');
            $table->string('company_telephone');
            $table->string('status')->default('UN-ACTIVE');
            $table->timestamps();
            $table->softDeletes();
            $table->by_how();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('suppliers');
    }
}
