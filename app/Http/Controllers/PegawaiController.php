<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('datamaster.pegawai', [
            "pegawai" => User::all()
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
        User::create([
            'name' => $request->nama,
            'is_manajemen' => $request->role,
            'email' => $request->email,
            'notelp_pegawai' => $request->notelp,
            'status_pegawai' => $request->status,
            'password' =>  $request->password,
        ]);
        return redirect('/pegawai');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $user = User::findOrFail($request->id);
        $user->name = $request->nama;
        $user->is_manajemen = $request->role;
        $user->email = $request->email;
        $user->notelp_pegawai = $request->notelp;
        $user->status_pegawai = $request->status;
        $user->save();

        return redirect('/pegawai');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect('/pegawai');
    }
}
