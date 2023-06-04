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
        Schema::create('pdks_entry_exit', function (Blueprint $table) {
        
            $table->string('person_id');
            $table->string('name_surname');
            $table->string('device_id');
            $table->dateTime('date_record');
            $table->unique(['device_id', 'date_record']);
            $table->string('input_output');
           
        });
   
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pdks_entry_exit');
    }
};
