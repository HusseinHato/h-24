<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use App\Models\Pasien;
use App\Models\Pembelian;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PembelianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('datamaster.obat', [
            'pembelian' => Pembelian::with('obats', 'pasien')->get(),
            'obat' => Obat::where('stok_obat', '>', 0)->get(),
            'pasien' => Pasien::where('user_id', Auth::user()->id)->get()
        ]);
    }

    public function getstok($id)
    {
        $obat = Obat::findOrFail($id);
        return $obat->stok_obat;
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
        $pembelian = new Pembelian();
        $pembelian->pasien_id = $request->input('pasien');
        $pembelian->total_harga_pembelian = 0;
        $pembelian->tgl_pembelian = Carbon::now();
        $pembelian->catatan = $request->input('catatan');
        $pembelian->save();

        // Simpan data obat ke dalam tabel detail_pembelian
        $obatIds = $request->input('obat');
        $tglDipesan = Carbon::now();
        $estimasiObatHabis = $request->input('est');
        $jumlahPembelian = $request->input('jumlah');

        foreach ($obatIds as $key => $obatId) {
            $obat = Obat::find($obatId);
            $subtotalPembelian = $obat->harga_obat * $jumlahPembelian[$key];

            // Melalui relasi obat, gunakan metode attach() untuk menyimpan data pivot
            $pembelian->obats()->attach($obat, [
                'tgl_dipesan' => $tglDipesan,
                'estimasi_obat_habis' => $estimasiObatHabis[$key],
                'jumlah_pembelian' => $jumlahPembelian[$key],
                'subtotal_pembelian' => $subtotalPembelian,
            ]);

            $pembelian->total_harga_pembelian += $subtotalPembelian;
            $pembelian->save();
            $obat->stok_obat -= $jumlahPembelian[$key];
            $obat->save();
        }

        // Redirect atau berikan respons sesuai dengan kebutuhan Anda
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Pembelian $pembelian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pembelian $pembelian)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $pembelian = Pembelian::findOrFail($request->input('idpembelian'));
        $pembelian->pasien_id = $request->input('pasien');
        $pembelian->catatan = $request->input('catatan');
        $pembelian->total_harga_pembelian = 0;
        $pembelian->save();

        // Simpan data obat ke dalam tabel detail_pembelian
        $obatIds = $request->input('obat');
        $tglDipesan = Carbon::now();
        $estimasiObatHabis = $request->input('est');
        $jumlahPembelian = $request->input('jumlah');


        // Hapus semua data detail_pembelian yang terkait dengan pembelian ini
        foreach ($pembelian->obats as $detail) {
            $obat = Obat::find($detail->id);
            $obat->stok_obat += $detail->pivot->jumlah_pembelian;
            $obat->save();
        }

        $pembelian->obats()->detach();

        foreach ($obatIds as $key => $obatId) {
            $obat = Obat::find($obatId);
            $subtotalPembelian = $obat->harga_obat * $jumlahPembelian[$key];

            // Melalui relasi obats, gunakan metode attach() untuk menyimpan data pivot
            $pembelian->obats()->attach($obat, [
                'tgl_dipesan' => $tglDipesan,
                'estimasi_obat_habis' => $estimasiObatHabis[$key],
                'jumlah_pembelian' => $jumlahPembelian[$key],
                'subtotal_pembelian' => $subtotalPembelian,
            ]);

            $pembelian->total_harga_pembelian += $subtotalPembelian;
            $pembelian->save();
            $obat->stok_obat -= $jumlahPembelian[$key];
            $obat->save();
        }

        // Redirect atau berikan respons sesuai dengan kebutuhan Anda
        return redirect()->back()->with('success', 'Pembelian berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pembelian $pembelian)
    {
        //
    }
}
