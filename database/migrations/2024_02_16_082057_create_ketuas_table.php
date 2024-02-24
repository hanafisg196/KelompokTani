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
        Schema::create('ketuas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nama', 100);
            $table->string('alamat', 100)->nullable();
            $table->string('email', 100)->nullable();
            $table->string('nohp', 100)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ketuas');
    }
};
