<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CopModels extends Model
{
    protected $table = 'cop_data';
    protected $fillable = [
        'namakapal',
        'namakapten',
        'bendera',
        'besarkapal',
        'noimo',
        'pelabuhanasal',
        'pelabuhantujuan',
        'tanggaltiba',
        'jamtiba',
        'lokasitiba',
        'tanggalsandar',
        'jamsandar',
        'lokasisandar',
        'tanggaldiperiksa',
        'jamdiperiksa',
        'lokasidiperiksa',
        'abkasing',
        'abkri',
        'penumpangasing',
        'penumpangri',
        'isyarat_karantina',
        'aktivitas_diatas_kapal',
        'kes_maritim',
        'kes_maritim_kondisi',
        'kes_maritim_alasan',
        'sani_kpl',
        'sani_kpl_tempat_terbit',
        'sani_kpl_tanggal_terbit',
        'sani_kpl_berlaku_sampai',
        'sani_kpl_kondisi',
        'sani_kpl_kondisi2',
        'sani_kpl_alasan',
        'daftar_abk_kondisi',
        'daftar_abk_alasan',
        'daftar_vaksinasi_kondisi',
        'daftar_vaksinasi_alasan',
        'buku_icv_kondisi',
        'buku_icv_kondisi2',
        'buku_icv_alasan',
        'p3k_tempat_terbit',
        'p3k_tanggal_terbit',
        'p3k_berlaku_sampai',
        'p3k_kondisi',
        'p3k_kondisi2',
        'p3k_alasan',
        'buku_kesehatan_tempat_terbit',
        'buku_kesehatan_tanggal_terbit',
        'buku_kesehatan_kondisi',
        'buku_kesehatan_kondisi2',
        'buku_kesehatan_alasan',
        'ctt_perjalanan_kondisi',
        'ctt_perjalanan_alasan',
        'faktor_resiko_pheic',

        'pelanggaran_kondisi',
        'dokumen_kesehatan_kondisi',
        'masalah_pheic_kondisi',
        'masalah_pheic_lainnya',

        'pelanggaran_karantina_kondisi',
        'dokumen_kesehatan_kondisi2',
        'penanganan_masalah_kondisi',
        'penanganan_masalah_lainnya',

        'sertif_izin_karantina_tanggal',
        'sertif_izin_karantina_jam',
        'sertif_izin_karantina_kondisi',

        'nama_nahkoda',
        'signature_nahkoda',
        
        'nama_petugas_1',
        'signature_petugas_1',

        'nama_petugas_2',
        'signature_petugas_2',

        'nama_petugas_3',
        'signature_petugas_3',
    ];
}
