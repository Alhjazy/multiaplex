<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHRMSSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hrms_settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('emp_identification')->nullable();
            $table->string('emp_serial')->nullable();
            $table->text('trim_condition')->nullable();
            $table->text('remarks')->nullable();
            $table->text('print_id_header')->nullable();
            $table->text('print_id_footer')->nullable();
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
        Schema::dropIfExists('hrms_settings');
    }
}
