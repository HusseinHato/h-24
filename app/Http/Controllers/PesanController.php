<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesan;
use App\Models\User;

class PesanController extends Controller
{
    //
    public function index()
    {
        return view('datamaster.pesan', [
            'pesan' => Pesan::all(),
            'pegawai' => User::where('is_manajemen', false)->get(),
        ]);
    }

    public function indexpegawai()
    {
        return view('datamaster.pesan', [
            'pesan' => Pesan::where("sender", auth()->user()->notelp_pegawai)
                            ->orWhere("target", auth()->user()->notelp_pegawai)
                            ->get(),
        ]);
    }
}
