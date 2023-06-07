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
        Schema::create('pdks_door', function (Blueprint $table) {
            $table->id();
            $table->string('entry_ip');
            $table->string('exit_ip');
            $table->integer('entry_port');
            $table->integer('exit_port');
            $table->string('door_name');
            $table->string('company_name');
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
        Schema::dropIfExists('pdks_door');
    }
};
