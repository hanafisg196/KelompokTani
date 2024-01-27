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
        Schema::create('pembayarans', function (Blueprint $table) {
            $table->id();
            $table->string('bukti_transfer')->nullable();
            $table->string('invoice')->nullable();
            $table->string('alamat')->nullable();
            $table->integer('total')->nullable();
            $table->string('status')->nullable();
            $table->unsignedBigInteger('order_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('rekening_id')->nullable();

            $table->timestamps();
            $table->foreign("order_id")->on("orders")->references("id");
            $table->foreign("user_id")->on("users")->references("id");
            $table->foreign("rekening_id")->on("rekenings")->references("id_rekening");


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pembayarans');
    }
};
