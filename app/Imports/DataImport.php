<?php

namespace App\Imports;

use App\Models\BankData;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\SkipsFirstHeader;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Carbon\Carbon;

class DataImport implements ToModel, WithStartRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // Debug: Tampilkan baris yang sedang diproses
        // date_default_timezone_set('Asia/Jakarta');
        \Log::info('Processing row: ', $row);

        // $rowCount = count($row);
        // echo $rowCount."<br>";
        // if ($rowCount < 6) {
        //     Log::error('Row does not have enough columns: ', $row);
        //     return null;
        // }

        // print_r($row);
        // echo "<br><br>";
        // exit;


        return new BankData([
            'id'                    => $row[2] ?? null,
            'no_kkp'                 => $row[3] ?? null,  // Nomor KKP
            'no_registrasi_imo'      => $row[4] ?? null,  // Nomor Registrasi IMO
            'nama_kapal'             => $row[5] ?? null,  // Nama Kapal
            'jenis_kapal'            => $row[6] ?? null,  // Jenis Kapal
            'bendera_kapal'          => $row[7] ?? null,  // Bendera Kapal
            'berat'                  => $row[8] ?? null,  // Berat Kapal
            'pelabuhan_kedatangan'   => $row[9] ?? null,  // Pelabuhan Kedatangan
            'pelabuhan_berikutnya'   => $row[10] ?? null,  // Pelabuhan Berikutnya
            'jml_abk_wna'           => $row[11] ?? null,  // Jumlah ABK WNA
            'jml_abk_wni'           => $row[12] ?? null,  // Jumlah ABK WNI
            'jml_penumpang_wna'     => $row[13] ?? null, // Jumlah Penumpang WNA
            'jml_penumpang_wni'     => $row[14] ?? null, // Jumlah Penumpang WNI
            'tanggal_terbit'         => $row[15] ?? null, // Tanggal Terbit
            'jam_terbit'             => $row[16] ?? null, // Jam Terbit
            'nama_penerbit'          => $row[17] ?? null, // Nama Penerbit
            'berlaku_sampai_tanggal' => $row[18] ?? null, // Berlaku Sampai Tanggal
            'nama_petugas'           => $row[19] ?? null, // Nama Petugas
            'keterangan'             => $row[20] ?? null, // Keterangan
            'tanggal_published'      => $row[21] ?? null, // Tanggal Published
            'qr_code'                => $row[22] ?? null, // QR Code
            'nama_wajib_bayar'       => $row[23] ?? null, // Nama Wajib Bayar
            'npn'                    => $row[24] ?? null, // NPN
            'ntb'                    => $row[25] ?? null, // NTB
            'jam_bayar'              => $row[26] ?? null, // Jam Bayar
        ]);
    }

    /**
     * Mengatur baris awal untuk memulai pengimporan.
     *
     * @return int
     */
    public function startRow(): int
    {
        return 9; // Mulai dari baris ke-8
    }
}
