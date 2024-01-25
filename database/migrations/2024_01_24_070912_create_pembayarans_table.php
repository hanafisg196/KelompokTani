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
            $table->string('bukti_transfer');
            $table->string('alamat');
            $table->integer('total');
            $table->unsignedBigInteger('order_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('ongkir_id')->nullable();
            $table->unsignedBigInteger('rekening_id')->nullable();

            $table->timestamps();


            $table->foreign("order_id")->on("orders")->references("id");
            $table->foreign("ongkir_id")->on("ongkirs")->references("id_ongkir");
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