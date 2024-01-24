<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('total_produk');
            $table->integer('total_bayar');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('cart_id')->nullable();

            $table->foreign('cart_id')->references('id')->on('carts')->onDelete('cascade');
            $table->foreign("cart_id")->on("carts")->references("id");
            $table->foreign("user_id")->on("users")->references("id");
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
        Schema::dropIfExists('orders');
    }
};
