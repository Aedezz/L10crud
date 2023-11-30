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
            $table->increments('iduks');
            $table->string('nis');
            $table->foreign('nis')->references('nis')->on('nis');

            $table->string('idkelas')->nullable();
            $table->foreign('idkelas')->references('idkelas')->on('kelas')->nullable();        

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
