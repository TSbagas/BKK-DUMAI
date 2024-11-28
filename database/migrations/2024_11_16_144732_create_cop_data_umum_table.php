<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cop_data_umum', function (Blueprint $table) {
            $table->id();
            $table->string('namakapal', 100);
            $table->string('namakapten', 100);
            $table->string('bendera', 100);
            $table->string('besarkapal', 100);
            $table->string('noimo', 100);
            $table->string('pelabuhanasal', 100);
            $table->string('pelabuhantujuan', 100);
            $table->date('tanggaltiba')->nullable();
            $table->time('jamtiba')->nullable();
            $table->string('lokasitiba', 100);
            $table->date('tanggalsandar')->nullable();
            $table->time('jamsandar')->nullable();
            $table->string('lokasisandar', 100);
            $table->date('tanggaldiperiksa')->nullable();
            $table->time('jamdiperiksa')->nullable();
            $table->string('lokasidiperiksa', 100);
            $table->integer('abkasing');
            $table->integer('abkri');
            $table->integer('penumpangasing');
            $table->integer('penumpangri');
            $table->timestamps(); // Timestamps untuk created_at dan updated_at
            
            // A. Pelanggaran Karantina
            $table->string('isyarat_karantina', 200);
            $table->string('aktivitas_diatas_kapal', 200);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cop_data_umum');
    }
};
