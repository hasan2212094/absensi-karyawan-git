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
        Schema::create('presensis', function (Blueprint $table) {
            $table->id();
            $table->integer('id_karyawan')->cascadeOnDelete();
            $table->date('tanggal');
            $table->time('jammasuk')->nullable();
            $table->time('jamkeluar')->nullable();
            $table->time('jamlembur')->nullable();
            $table->time('jamkerja')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('presensis');
    }
};
