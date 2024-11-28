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
        Schema::create('bank_data', function (Blueprint $table) {
            $table->id(); // Auto-incrementing ID
            $table->string('no_kkp', 50); // Nomor KKP
            $table->string('no_registrasi_imo', 50); // Nomor Registrasi IMO
            $table->string('nama_kapal', 100); // Nama Kapal
            $table->string('jenis_kapal', 50)->nullable(); // Jenis Kapal
            $table->string('bendera_kapal', 50)->nullable(); // Bendera Kapal
            $table->decimal('berat', 10, 2)->nullable(); // Berat Kapal
            $table->string('pelabuhan_kedatangan', 100)->nullable(); // Pelabuhan Kedatangan
            $table->string('pelabuhan_berikutnya', 100)->nullable(); // Pelabuhan Berikutnya
            $table->integer('jml_abk_wna')->default(0); // Jumlah ABK WNA
            $table->integer('jml_abk_wni')->default(0); // Jumlah ABK WNI
            $table->integer('jml_penumpang_wna')->default(0); // Jumlah Penumpang WNA
            $table->integer('jml_penumpang_wni')->default(0); // Jumlah Penumpang WNI
            $table->date('tanggal_terbit')->nullable(); // Tanggal Terbit
            $table->time('jam_terbit')->nullable(); // Jam Terbit
            $table->string('nama_penerbit', 100)->nullable(); // Nama Penerbit
            $table->date('berlaku_sampai_tanggal')->nullable(); // Berlaku Sampai Tanggal
            $table->string('nama_petugas', 100)->nullable(); // Nama Petugas
            $table->text('keterangan')->nullable(); // Keterangan
            $table->date('tanggal_published')->nullable(); // Tanggal Published
            $table->string('qr_code', 255)->nullable(); // QR Code
            $table->string('nama_wajib_bayar', 100)->nullable(); // Nama Wajib Bayar
            $table->string('npn', 50)->nullable(); // NPN
            $table->string('ntb', 50)->nullable(); // NTB
            $table->time('jam_bayar')->nullable(); // Jam Bayar
            $table->timestamps(); // Timestamps untuk created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bank_data');
    }
};
