<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Obat;
use App\Models\User;
use App\Models\Pasien;
use App\Models\Pembelian;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // return view('/pegawai');
        return view('manajemen', [
            "jml_obat" => Obat::all()->count(),
            "jml_user" => User::all()->count(),
            "jml_pembelian" => Pembelian::all()->count(),
            "jml_pasien" => Pasien::all()->count(),
        ]);
        // return view('home');
    }
}
