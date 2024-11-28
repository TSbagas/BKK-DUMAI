<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BankData extends Model
{
    protected $table = 'bankdata';
    protected $fillable = [
        'no_kkp',
        'no_registrasi_imo',
        'nama_kapal',
        'jenis_kapal',
        'bendera_kapal',
        'berat',
        'pelabuhan_kedatangan',
        'pelabuhan_berikutnya',
        'jml_abk_wna',
        'jml_abk_wni',
        'jml_penumpang_wna',
        'jml_penumpang_wni',
        'tanggal_terbit',
        'jam_terbit',
        'nama_penerbit',
        'berlaku_sampai_tanggal',
        'nama_petugas',
        'keterangan',
        'tanggal_published',
        'qr_code',
        'kode_billing',
        'nama_wajib_bayar',
        'npn',
        'ntb',
        'jam_bayar',
    ];
}
