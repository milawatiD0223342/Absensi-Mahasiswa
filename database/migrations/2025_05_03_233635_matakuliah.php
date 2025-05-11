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
    Schema::create('matakuliahs', function (Blueprint $table) {
        $table->id();
        $table->string('kode')->unique();
        $table->string('nama');
        $table->unsignedBigInteger('dosen_id');
        $table->timestamps();

        $table->foreign('dosen_id')->references('id')->on('dosens')->onDelete('cascade');

        $table->foreignId('mahasiswa_id')->constrained()->onDelete('cascade');
        $table->foreignId('matakuliah_id')->constrained()->onDelete('cascade');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('matakuliahs');
    }
};
