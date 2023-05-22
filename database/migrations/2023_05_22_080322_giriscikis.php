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
        Schema::create('giriscikis', function (Blueprint $table) {
            $table->id();
            $table->string('uid');
            $table->string('ad_soyad');
            $table->string('firmaGC');
            $table->date('tarih');
            $table->time('saat');
            $table->string('GC');
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
        Schema::dropIfExists('giriscikis');
    }
};
