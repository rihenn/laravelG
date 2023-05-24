<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * 
     * @return void
     */
    public function up()
    {
        Schema::create('pdks-divece_users', function (Blueprint $table) {
            $table->string('id');
            $table->string('uid');
            $table->string('name');
            $table->string('role');
            $table->string('password');
            $table->string('card_number');
            $table->string('divece_id');
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
        Schema::dropIfExists('pdks-divece_users');
    }
};
