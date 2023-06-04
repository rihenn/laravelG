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
        Schema::create('pdks_device_users', function (Blueprint $table) {
            $table->string('id');
            $table->string('uid');
            $table->string('name');
            $table->string('role');
            $table->string('password');
            $table->string('card_number');
            $table->string('device_id');
            $table->unique(['uid', 'device_id']);
           
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pdks_device_users');
    }
};
