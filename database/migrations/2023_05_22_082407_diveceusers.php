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
        Schema::create('diveceusers', function (Blueprint $table) {
            $table->string('id');
            $table->string('uid');
            $table->string('name');
            $table->string('role');
            $table->string('password');
            $table->string('CardNo');
            $table->string('cihazId');
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
        Schema::dropIfExists('deviceusers');
    }
};
