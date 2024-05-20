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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->date('batas_waktu');
            $table->string('posisi');
            $table->text('persyaratan');
            $table->unsignedBigInteger('jurusan_id');
            $table->unsignedBigInteger('perusahaan_id');
            $table->timestamps();

            // Foreign keys
            $table->foreign('jurusan_id')->references('id')->on('jurusans');
            $table->foreign('perusahaan_id')->references('id')->on('industri');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
