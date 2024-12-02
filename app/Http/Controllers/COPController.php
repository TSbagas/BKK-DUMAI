<?php

namespace App\Http\Controllers;

use App\Models\CopModels;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class COPController extends Controller
{
    public function index()
    {
        return view('form.cop');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'namakapal' => 'nullable|string|max:100',
            'namakapten' => 'nullable|string|max:100',
            'bendera' => 'nullable|string|max:100',
            'besarkapal' => 'nullable|string|max:100',
            'noimo' => 'nullable|string|max:100',
            'pelabuhanasal' => 'nullable|string|max:100',
            'pelabuhantujuan' => 'nullable|string|max:100',
            'tanggaltiba' => 'nullable|date',
            'jamtiba' => 'nullable|date_format:H:i:s',
            'lokasitiba' => 'nullable|string|max:100',
            'tanggalsandar' => 'nullable|date',
            'jamsandar' => 'nullable|date_format:H:i:s',
            'lokasisandar' => 'nullable|string|max:100',
            'tanggaldiperiksa' => 'nullable|date',
            'jamdiperiksa' => 'nullable|date_format:H:i:s',
            'lokasidiperiksa' => 'nullable|string|max:100',

            'abkasing' => 'nullable|integer',
            'abkri' => 'nullable|integer',
            'penumpangasing' => 'nullable|integer',
            'penumpangri' => 'nullable|integer',
            'isyarat_karantina' => 'nullable|string|max:200',
            'aktivitas_diatas_kapal' => 'nullable|string|max:200',
            // 'kes_maritim' => 'nullable|string|max:200',
            'kes_maritim_kondisi' => 'nullable|string|max:200',
            'kes_maritim_alasan' => 'nullable|string',
            // 'sani_kpl' => 'nullable|string|max:200',

            'sani_kpl_tempat_terbit' => 'nullable|string|max:200',
            'sani_kpl_tanggal_terbit' => 'nullable|date',
            'sani_kpl_berlaku_sampai' => 'nullable|date',
            'sani_kpl_kondisi' => 'nullable|string|max:200',
            'sani_kpl_kondisi2' => 'nullable|string|max:200',
            'sani_kpl_alasan' => 'nullable|string',

            // 'daftar_abk' => 'nullable|string|max:200',
            'daftar_abk_kondisi' => 'nullable|string|max:200',
            'daftar_abk_alasan' => 'nullable|string',
            // 'daftar_vaksinasi' => 'nullable|string|max:200',

            'daftar_vaksinasi_kondisi' => 'nullable|string|max:200',
            'daftar_vaksinasi_alasan' => 'nullable|string',
            // 'buku_icv' => 'nullable|string|max:200',
            'buku_icv_kondisi' => 'nullable|string|max:200',
            'buku_icv_kondisi2' => 'nullable|string|max:200',
            'buku_icv_alasan' => 'nullable|string',
            // 'p3k' => 'nullable|string|max:200',

            'p3k_tempat_terbit' => 'nullable|string|max:200',
            'p3k_tanggal_terbit' => 'nullable|date',
            'p3k_berlaku_sampai' => 'nullable|date',
            'p3k_kondisi' => 'nullable|string|max:200',
            'p3k_kondisi2' => 'nullable|string|max:200',
            'p3k_alasan' => 'nullable|string',
            // 'buku_kesehatan' => 'nullable|string|max:200',

            'buku_kesehatan_tempat_terbit' => 'nullable|string|max:200',
            'buku_kesehatan_tanggal_terbit' => 'nullable|date',
            'buku_kesehatan_kondisi' => 'nullable|string|max:200',
            'buku_kesehatan_kondisi2' => 'nullable|string|max:200',
            'buku_kesehatan_alasan' => 'nullable|string',
            // 'ctt_perjalanan' => 'nullable|string|max:200',
            'ctt_perjalanan_kondisi' => 'nullable|string|max:200',
            'ctt_perjalanan_alasan' => 'nullable|string',
            'faktor_resiko_pheic' => 'nullable|string',
            // 'pheic' => 'nullable|string|max:200',
            'pelanggaran_kondisi' => 'nullable|string|max:200',
            'dokumen_kesehatan_kondisi' => 'nullable|string|max:200',
            'masalah_pheic_kondisi' => 'nullable|string|max:200',
            'masalah_pheic_alasan' => 'nullable|string',
            'pelanggaran_karantina_kondisi' => 'nullable|string|max:200',

            'dokumen_kesehatan_kondisi2' => 'nullable|string|max:200',
            'penanganan_masalah_kondisi' => 'nullable|string|max:200',
            'penanganan_masalah_lainnya' => 'nullable|string',
            'sertif_izin_karantina_tanggal' => 'nullable|date',
            'sertif_izin_karantina_jam' => 'nullable|date_format:H:i:s',
            'sertif_izin_karantina_kondisi' => 'nullable|string|max:200',

            'nama_nahkoda' => 'required|string|max:100',
            'signature_nahkoda' => 'required|string',

            'nama_petugas_1' => 'required|string|max:100',
            'signature_petugas_1' => 'required|string',

            'nama_petugas_2' => 'required|string|max:100',
            'signature_petugas_2' => 'required|string',

            'nama_petugas_3' => 'required|string|max:100',
            'signature_petugas_3' => 'required|string',

        ]);

        $signatures = [];
        foreach (['signature_nahkoda', 'signature_petugas_1', 'signature_petugas_2', 'signature_petugas_3'] as $signatureField) {
            if ($request->filled($signatureField)) {
                $data = $request->input($signatureField);

                $data = preg_replace('/^data:image\/\w+;base64,/', '', $data);

                $fileName = "{$signatureField}_" . time() . ".png";
                $filePath = "signatures/{$fileName}";

                Storage::put($filePath, base64_decode($data));

                $signatures[$signatureField] = $filePath;
            }
        }

        $validatedData = array_merge($validatedData, $signatures);

        CopModels::create($validatedData);

        return redirect('/cop')->with('success', 'Data successfully saved!');
    }
}
