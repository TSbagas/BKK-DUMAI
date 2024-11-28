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
        Schema::create('cop_data', function (Blueprint $table) {
            $table->id();
            // I. Daftar Umum
            $table->string('namakapal', 100);
            $table->string('namakapten', 100);
            $table->string('bendera', 100);
            $table->string('besarkapal', 100);
            $table->string('noimo', 100);
            $table->string('pelabuhanasal', 100);
            $table->string('pelabuhantujuan', 100);

            $table->date('tanggaltiba');
            $table->time('jamtiba');

            $table->string('lokasitiba', 100);

            $table->date('tanggalsandar');
            $table->time('jamsandar');

            $table->string('lokasisandar', 100);

            $table->date('tanggaldiperiksa');
            $table->time('jamdiperiksa');

            $table->string('lokasidiperiksa', 100);
            $table->integer('abkasing');
            $table->integer('abkri');
            $table->integer('penumpangasing');
            $table->integer('penumpangri');
            $table->timestamps(); // Timestamps untuk created_at dan updated_at
            
            // II. Daftar Khusus

            // Pelanggaran Karantina
            // 1. Isyarat Karantina
            $table->string('isyarat_karantina', 200);
            // 2. Aktivitas Di Atas Kapal
            $table->string('aktivitas_diatas_kapal', 200);

            // B. Dokumen Kesehatan

            // 1. Pernyataan Kesehatan Maritim
            $table->string('kes_maritim_kondisi', 200);
            $table->text('kes_maritim_alasan')->nullable();

            // // 2. Sertifikat Sanitasi Kapal
            $table->string('sani_kpl_tempat_terbit', 200);
            $table->date('sani_kpl_tanggal_terbit');
            $table->date('sani_kpl_berlaku_sampai');
            $table->string('sani_kpl_kondisi', 200);
            $table->string('sani_kpl_kondisi2', 200)->nullable();
            $table->text('sani_kpl_alasan')->nullable();

            // // 3. Daftar ABK
            $table->string('daftar_abk_kondisi', 200);
            $table->text('daftar_abk_alasan')->nullable();

            // // 4. Daftar Vaksinasi
            $table->string('daftar_vaksinasi_kondisi', 200);
            $table->text('daftar_vaksinasi_alasan')->nullable();

            // // 5. Buku ICV
            // $table->string('buku_icv', 200);
            $table->string('buku_icv_kondisi', 200);
            $table->string('buku_icv_kondisi2', 200)->nullable();
            $table->text('buku_icv_alasan')->nullable();

            // // 6. P3K
            // $table->string('p3k', 200);
            $table->string('p3k_tempat_terbit', 200);
            
            $table->date('p3k_tanggal_terbit');
            $table->date('p3k_berlaku_sampai');

            $table->string('p3k_kondisi', 200);
            $table->string('p3k_kondisi2', 200)->nullable();
            $table->text('p3k_alasan')->nullable();

            // // 7. Buku Kesehatan
            // $table->string('buku_kesehatan', 200);
            $table->string('buku_kesehatan_tempat_terbit', 200);

            $table->date('buku_kesehatan_tanggal_terbit');

            $table->string('buku_kesehatan_kondisi', 200);
            $table->string('buku_kesehatan_kondisi2', 200)->nullable();
            $table->text('buku_kesehatan_alasan')->nullable();

            // // 8. Catatan Perjalanan
            // $table->string('ctt_perjalanan', 200);
            $table->string('ctt_perjalanan_kondisi', 200);
            $table->text('ctt_perjalanan_alasan')->nullable();

            // // C. Faktor Resiko PHEIC 
            $table->string('faktor_resiko_pheic', 200);

            //KESIMPULAN

            //A. Pelanggaran
            $table->string('pelanggaran_kondisi', 200);

            //B. Dokumen kesehatan
            $table->string('dokumen_kesehatan_kondisi', 200);

            //C. Masalah PHEIC
            $table->string('masalah_pheic_kondisi', 200);
            $table->text('masalah_pheic_lainnya')->nullable();

            //D. Sertifikat Izin Karantina

            //REKOMENDASI

            //A. Pelanggaran Karantina
            $table->string('pelanggaran_karantina_kondisi', 200);

            //B. Dokumen Kesehatan
            $table->string('dokumen_kesehatan_kondisi2', 200);

            //C. Penanganan Masalah
            $table->string('penanganan_masalah_kondisi', 200);
            $table->text('penanganan_masalah_lainnya')->nullable();

            //D. Sertifikat Izin Karantina
            $table->date('sertif_izin_karantina_tanggal');
            $table->time('sertif_izin_karantina_jam');
            $table->string('sertif_izin_karantina_kondisi', 200);
            

            $table->string('nama_nahkoda', length: 100);
            $table->string('signature_nahkoda', length: 1000);

            $table->string('nama_petugas_1', 100);
            $table->string('signature_petugas_1', 1000);

            $table->string('nama_petugas_2', 100);
            $table->string('signature_petugas_2', 1000);

            $table->string('nama_petugas_3', 100);
            $table->string('signature_petugas_3', 1000);


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cop_data');
    }
};
