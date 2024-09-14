<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('jadwals', function (Blueprint $table) {
            $table->id();
            $table->string('bus')->default('MASARTO');
            $table->date('tanggal');
            $table->string('start');
            $table->string('finish');

            $table->bigInteger('crew1_id')->unsigned();
            $table->bigInteger('crew2_id')->unsigned();

            $table->text('keterangan')->nullable();

            $table->foreign('crew1_id')->references('id')->on('crews')->onDelete('cascade');
            $table->foreign('crew2_id')->references('id')->on('crews')->onDelete('cascade');
            
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwals');
    }
};
