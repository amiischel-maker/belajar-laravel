<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SampleController extends Controller
{
    // Fungsi untuk mengecek validasi usia
    public function tesusia()
    {
        $usia = 2;

        if (($usia > 0) && ($usia <= 5)) {
            return 'Usia anda valid';
        } else {
            return 'Usia anda tidak valid';
        }
    }

    // Fungsi untuk menampilkan usia
    public function usia()
    {
        $usia = 18;

        return 'Saya berusia ' . $usia . ' tahun';
    }

    // Fungsi untuk mengirim data ke view
    public function datausia()
    {
        $usia = 18;
        $jenkel = 'laki-laki';

        return view('usia', [
            'a' => $usia,
            'b' => $jenkel
        ]);
    }
}