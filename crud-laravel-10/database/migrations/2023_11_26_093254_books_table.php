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
        Schema::create('books', function (Blueprint $table) {
            $table->string('iduks')->primary();
            $table->string('nis');
            $table->foreign('nis')->references('nis')->on('nis');
            
            $table->string('idpetugas');
            $table->foreign('idpetugas')->references('idpetugas')->on('petugas');
            
            $table->string('idkelas');
            $table->foreign('idkelas')->references('idkelas')->on('kelas');
            
            $table->string('name');
            $table->string('kelas');
            $table->string('jurusan');
            $table->text('angkatan');
            $table->string('jk');
            $table->string('sakit');
            $table->string('penanganan');
            $table->string('petugas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
