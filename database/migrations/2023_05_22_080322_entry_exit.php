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
        Schema::create('pdks-entry_exit', function (Blueprint $table) {
        
            $table->string('uid')->unique();
            $table->string('person_id')->unique();
            $table->string('name_surname');
            $table->string('divece_id');
            $table->date('date_record')->datetime()->unique();
            $table->string('input_output');
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
        Schema::dropIfExists('pdks-entry_exit');
    }
};
