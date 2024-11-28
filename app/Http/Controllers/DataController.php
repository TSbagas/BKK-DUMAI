<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BankData;
use App\Imports\DataImport;
use Maatwebsite\Excel\Facades\Excel;
// use Illuminate\Support\Facades\Session;
use Session;
use Illuminate\Support\Facades\Validator;

class DataController extends Controller
{
    public function view(){
        return view('bank_data.view');
    }

    public function getData()
    {
        // Ambil semua data dari database
        $data = BankData::orderBy('id', 'asc')->get();

        // Kembalikan data dalam format JSON
        return response()->json(['data' => $data]);
    }

    public function import_data(Request $request){
        // Validasi
        $validator = Validator::make($request->all(), [
            'file' => 'required|file|mimes:xlsx,xls|max:2048', // Maksimum 2MB
        ]);

        if ($validator->fails()) {
            return redirect('/bank_data')
                        ->withErrors($validator)
                        ->withInput();
        }

        // Menangkap file excel
        $file = $request->file('file');

        // Debug untuk memastikan file diterima
        if(!$file) {
            return redirect('/bank_data')
                        ->withErrors(['file' => 'File not received'])
                        ->withInput();
        }

        // Membuat nama file unik
        $nama_file = rand() . $file->getClientOriginalName();

        // Upload ke folder bank_data_file di dalam folder public
        $file->move(public_path('bank_data_file'), $nama_file);

        // Debug untuk memastikan file path benar
        $filePath = public_path('bank_data_file/' . $nama_file);
        if(!file_exists($filePath)) {
            return redirect('/bank_data')
                        ->withErrors(['file' => 'File not found after upload'])
                        ->withInput();
        }

        // Import data
        try {
            Excel::import(new DataImport, $filePath);
            Session::flash('success', 'Data Berhasil Diimport!');
        } catch (\Exception $e) {
            Session::flash('error', 'Error importing data: ' . $e->getMessage());
        }

        // Alihkan halaman kembali
        return redirect('/bank_data');
    }

}
