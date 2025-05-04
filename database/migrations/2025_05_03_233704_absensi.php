<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('absensis', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('mahasiswa_id');
        $table->unsignedBigInteger('matakuliah_id');
        $table->date('tanggal');
        $table->time('jam');
        $table->enum('status', ['Hadir', 'Izin', 'Sakit', 'Alpha']);
        $table->timestamps();

        $table->foreign('mahasiswa_id')->references('id')->on('mahasiswas')->onDelete('cascade');
        $table->foreign('matakuliah_id')->references('id')->on('matakuliahs')->onDelete('cascade');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('absensis');
    }
};
