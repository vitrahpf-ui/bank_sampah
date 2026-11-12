<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NasabahController extends Controller
{
    
    
    public function dashboard() {
        return view('nasabah.dashboard');
    }

    public function riwayat() {
        return view('nasabah.riwayat'); // Mengarahkan ke riwayat.blade.php
    }

    public function kalkulator() {
        return view('nasabah.kalkulator');
    }

    public function tarik_saldo() {
        return view('nasabah.tarik_saldo'); // Mengarahkan ke tarik_saldo.blade.php
    }

    public function notifikasi() {
        return view('nasabah.notifikasi'); // Buat file notifikasi.blade.php jika belum ada
    }
    
}
