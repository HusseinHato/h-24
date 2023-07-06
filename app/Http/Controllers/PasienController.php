<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('datamaster.pasien', [
            'pasien' => Pasien::with('user')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Pasien::create([
            'nama_pasien' => $request->nama,
            'user_id' => $request->user_id,
            'notelp_pasien' => $request->notelp,
            'status_pasien' => $request->status,
            'alamat_pasien' =>  $request->alamatpasien,
        ]);
        return redirect('/pasien');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pasien $pasien)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pasien $pasien)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $pasien = Pasien::findOrFail($request->id);
        $pasien->nama_pasien = $request->nama;
        $pasien->notelp_pasien = $request->notelp;
        $pasien->status_pasien = $request->status;
        $pasien->alamat_pasien =  $request->alamatpasien;
        $pasien->save();
        return redirect('/pasien');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pasien $pasien)
    {
        $pasien->delete();
        return redirect('/pasien');
    }
}
