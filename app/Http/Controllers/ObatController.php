<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use Illuminate\Http\Request;

class ObatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('datamaster.stokobat', [
            'obat' => Obat::all()
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
        Obat::create([
            'nama_obat' => $request->nama,
            'kategori_obat' => $request->kategori,
            'harga_obat' => $request->harga,
            'stok_obat' => $request->stok,
        ]);
        return redirect('/stokobat');
    }

    /**
     * Display the specified resource.
     */
    public function show(Obat $obat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Obat $obat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $obat = Obat::findOrFail($request->id);
        $obat->nama_obat = $request->nama;
        $obat->kategori_obat = $request->kategori;
        $obat->harga_obat = $request->harga;
        $obat->stok_obat = $request->stok;
        $obat->save();
        return redirect('/stokobat');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        //
        $obat = Obat::findOrFail($request->id);
        $obat->delete();

        return redirect('/stokobat');

    }
}
