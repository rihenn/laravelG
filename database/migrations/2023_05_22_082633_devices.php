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
        Schema::create('pdks_devices', function (Blueprint $table) {
            $table->id();
            $table->string('ip');
            $table->integer('port');
            $table->string('device_name');
            $table->string('company_device_name');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * 
     * 
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pdks_devices');
    }
};
