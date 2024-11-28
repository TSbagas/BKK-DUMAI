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
            'namakapal' => 'required|string|max:100',
            'namakapten' => 'required|string|max:100',
            'bendera' => 'required|string|max:100',
            'besarkapal' => 'required|string|max:100',
            'noimo' => 'required|string|max:100',
            'pelabuhanasal' => 'required|string|max:100',
            'pelabuhantujuan' => 'required|string|max:100',
            'tanggaltiba' => 'required|date',
            'jamtiba' => 'required|date_format:H:i:s',
            'lokasitiba' => 'required|string|max:100',
            'tanggalsandar' => 'required|date',
            'jamsandar' => 'required|date_format:H:i:s',
            'lokasisandar' => 'required|string|max:100',
            'tanggaldiperiksa' => 'required|date',
            'jamdiperiksa' => 'required|date_format:H:i:s',
            'lokasidiperiksa' => 'required|string|max:100',

            'abkasing' => 'required|integer',
            'abkri' => 'required|integer',
            'penumpangasing' => 'required|integer',
            'penumpangri' => 'required|integer',
            'isyarat_karantina' => 'required|string|max:200',
            'aktivitas_diatas_kapal' => 'required|string|max:200',
            // 'kes_maritim' => 'required|string|max:200',
            'kes_maritim_kondisi' => 'required|string|max:200',
            'kes_maritim_alasan' => 'nullable|string',
            // 'sani_kpl' => 'required|string|max:200',

            'sani_kpl_tempat_terbit' => 'nullable|string|max:200',
            'sani_kpl_tanggal_terbit' => 'required|date',
            'sani_kpl_berlaku_sampai' => 'required|date',
            'sani_kpl_kondisi' => 'required|string|max:200',
            'sani_kpl_kondisi2' => 'nullable|string|max:200',
            'sani_kpl_alasan' => 'nullable|string',

            // 'daftar_abk' => 'required|string|max:200',
            'daftar_abk_kondisi' => 'required|string|max:200',
            'daftar_abk_alasan' => 'nullable|string',
            // 'daftar_vaksinasi' => 'required|string|max:200',

            'daftar_vaksinasi_kondisi' => 'required|string|max:200',
            'daftar_vaksinasi_alasan' => 'nullable|string',
            // 'buku_icv' => 'required|string|max:200',
            'buku_icv_kondisi' => 'required|string|max:200',
            'buku_icv_kondisi2' => 'nullable|string|max:200',
            'buku_icv_alasan' => 'nullable|string',
            // 'p3k' => 'required|string|max:200',

            'p3k_tempat_terbit' => 'nullable|string|max:200',
            'p3k_tanggal_terbit' => 'required|date',
            'p3k_berlaku_sampai' => 'required|date',
            'p3k_kondisi' => 'required|string|max:200',
            'p3k_kondisi2' => 'nullable|string|max:200',
            'p3k_alasan' => 'nullable|string',
            // 'buku_kesehatan' => 'required|string|max:200',

            'buku_kesehatan_tempat_terbit' => 'nullable|string|max:200',
            'buku_kesehatan_tanggal_terbit' => 'required|date',
            'buku_kesehatan_kondisi' => 'required|string|max:200',
            'buku_kesehatan_kondisi2' => 'nullable|string|max:200',
            'buku_kesehatan_alasan' => 'nullable|string',
            // 'ctt_perjalanan' => 'required|string|max:200',
            'ctt_perjalanan_kondisi' => 'required|string|max:200',
            'ctt_perjalanan_alasan' => 'nullable|string',
            'faktor_resiko_pheic' => 'nullable|string',
            // 'pheic' => 'nullable|string|max:200',
            'pelanggaran_kondisi' => 'required|string|max:200',
            'dokumen_kesehatan_kondisi' => 'required|string|max:200',
            'masalah_pheic_kondisi' => 'required|string|max:200',
            'masalah_pheic_alasan' => 'nullable|string',
            'pelanggaran_karantina_kondisi' => 'required|string|max:200',

            'dokumen_kesehatan_kondisi2' => 'required|string|max:200',
            'penanganan_masalah_kondisi' => 'required|string|max:200',
            'penanganan_masalah_lainnya' => 'nullable|string',
            'sertif_izin_karantina_tanggal' => 'required|date',
            'sertif_izin_karantina_jam' => 'required|date_format:H:i:s',
            'sertif_izin_karantina_kondisi' => 'required|string|max:200',

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
