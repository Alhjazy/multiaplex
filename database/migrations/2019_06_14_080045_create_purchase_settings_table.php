<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchaseSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('identification');
            $table->string('serial');
            $table->text('trim_condition')->nullable();
            $table->text('remarks')->nullable();
            $table->text('print_order_header')->nullable();
            $table->text('print_order_footer')->nullable();
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
        Schema::dropIfExists('purchase_settings');
    }
}
