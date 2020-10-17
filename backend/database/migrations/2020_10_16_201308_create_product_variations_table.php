<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductVariationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_variations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id')->index();
            $table->string('name');
            $table->integer('price')->nullable();
            $table->integer('order')->nullable();
            $table->unsignedBigInteger('product_variation_type_id')->index();
            $table->timestamps();

            $table->foreign('product_id')
                ->on('products')
                ->references('id');

            $table->foreign('product_variation_type_id')
                ->on('product_variation_types')
                ->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_variations');
    }
}
