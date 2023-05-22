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
        Schema::create('kullaniciler', function (Blueprint $table) {
            $table->id();
            $table->string('nameSurename');
            $table->string('cardno');
            $table->string('mail');
            $table->string('tel');
            $table->string('username');
            $table->string('password');
            $table->string('profilurl');
            $table->string('görev');
            $table->boolean('admin')->default(false);
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
        Schema::dropIfExists('kullaniciler');
    }
};
