<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('keywords')->nullable();
            $table->string('description')->nullable();
            $table->longText('full_description')->nullable();
            $table->string('preview_img')->nullable();
            $table->text('images')->nullable();
            $table->boolean('status')->default(1);
            $table->boolean('in_stock')->default(1);
            $table->integer('price')->nullable();
            $table->integer('new_price')->nullable();
            $table->timestamps();
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
