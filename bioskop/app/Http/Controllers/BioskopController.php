<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class BioskopController extends Controller
{
    public function index()
    {
        return view('bioskop');
    }

    public function proses(Request $request)
    {
        // Mengambil data dari form
        $nama = $request->nama;
        $tanggalLahir = Carbon::parse($request->tanggalLahir);
        $usia = $tanggalLahir->age;

        // Menentukan kategori usia
        if ($usia <= 5) {
            $keterangan = 'Balita';
            $status = 'Tidak boleh masuk bioskop';
        } elseif ($usia <= 12) {
            $keterangan = 'Anak-anak';
            $status = 'Tidak boleh masuk bioskop';
        } elseif ($usia <= 17) {
            $keterangan = 'Remaja';
            $status = 'Tidak boleh masuk bioskop';
        } elseif ($usia <= 44) {
            $keterangan = 'Dewasa';
            $status = 'Boleh masuk bioskop';
        } elseif ($usia <= 60) {
            $keterangan = 'Orang Tua';
            $status = 'Boleh masuk bioskop';
        } else {
            $keterangan = 'Lansia';
            $status = 'Boleh masuk bioskop';
        }

        return view('bioskop', compact(
            'nama',
            'tanggalLahir',
            'usia',
            'keterangan',
            'status'
        ));
    }
}