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
        $request->validate([
            'nama' => 'required|string|max:100',
            'tanggal_lahir' => 'required|date|before_or_equal:today',
        ]);

        $nama = $request->nama;
        $tanggalLahir = Carbon::parse($request->tanggal_lahir);
        $usia = $tanggalLahir->age;

        if ($usia <= 5) {
            $keterangan = 'Balita';
        } elseif ($usia <= 12) {
            $keterangan = 'Anak-anak';
        } elseif ($usia <= 17) {
            $keterangan = 'Remaja';
        } elseif ($usia <= 44) {
            $keterangan = 'Dewasa';
        } elseif ($usia <= 60) {
            $keterangan = 'Orang Tua';
        } else {
            $keterangan = 'Lansia';
        }

        $status = $usia >= 18
            ? 'Boleh Masuk Bioskop'
            : 'Tidak Boleh Masuk Bioskop';

        return view('bioskop', compact(
            'nama',
            'tanggalLahir',
            'usia',
            'keterangan',
            'status'
        ));
    }
}