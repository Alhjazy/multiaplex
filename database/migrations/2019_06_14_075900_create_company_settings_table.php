<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanySettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('telephone')->nullable();
            $table->string('website')->nullable();
            $table->string('currency')->nullable();
            $table->string('certification_number')->nullable();
            $table->string('tax_registration_number')->nullable();
            $table->string('employee_count')->nullable();
            $table->string('year_of_establishment')->nullable();
            $table->string('office_timings')->nullable();
            $table->string('product_categories')->nullable();
            $table->string('country')->nullable();
            $table->string('emirates')->nullable();
            $table->string('address_line1')->nullable();
            $table->string('address_line2')->nullable();
            $table->string('zip_code')->nullable();
            $table->string('city')->nullable();
            $table->string('fax')->nullable();
            $table->string('logo')->nullable();
            $table->string('image_trade_license')->nullable();
            $table->string('image_1')->nullable();
            $table->string('image_2')->nullable();
            $table->string('image_3')->nullable();
            $table->string('image_4')->nullable();
            $table->text('profile')->nullable();
            $table->text('about')->nullable();
            $table->date('tax_registration_date')->nullable();
            $table->string('status')->default('ACTIVE');
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
        Schema::dropIfExists('company_settings');
    }
}
