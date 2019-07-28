<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('description')->nullable();
            $table->string('model')->unique();
            $table->string('sku')->unique();
            $table->string('upc')->unique();
            $table->string('ean')->unique();
            $table->string('jan')->unique();
            $table->string('isbn')->unique();
            $table->string('mpn')->unique();
            $table->string('made_in')->nullable();
            $table->string('production')->default('NO');
            $table->string('stored')->default('NO');
            $table->string('Expenses')->default('NO');
            $table->string('rawـmaterial')->default('NO');
            $table->string('dimensions')->nullable();
            $table->string('length_class')->nullable();
            $table->string('weight')->nullable();
            $table->string('weight_class')->nullable();
            $table->string('unit_type');
            $table->string('status')->default('UnActive');
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
        Schema::dropIfExists('products');
    }
}
