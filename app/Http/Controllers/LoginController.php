<?php

// use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Facades\Auth;
// use App\Models\User;



namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    // public function preLogin(){
    //     if(Auth::check()){
    //         if(Auth::user()->role == 'admin'){
    //             return redirect('/dashboard');
    //         }
    //         else{
    //             return redirect('/pegawai');
    //         }
    //     }
    //     else{
    //         return view('login/login');
    //     }
    // }

    // public function postLogin(Request $request){
    //     $data = $request->only('email', 'password');
    //     if(Auth::attempt($data)){
    //         if(Auth::user()->role == 'admin'){
    //             return redirect('/dashboard');
    //         }
    //         else{
    //             return redirect('/pegawai');
    //         }
    //     }
    //     else{
    //         return view('login/login');
    //     }
    // }

    // public function preRegister(){
    //     return view('/register');
    // }

    // public function postRegister(Request $request)
    // {
    //  $this->validate($request,[
    //     'name'=>'required',
    //     'email'=>'required|email|unique:admin',
    //     'password'=>'required',
    //     'cpassword'=> 'required|same:password',
    //  ]);

    //  User::create([
    //     'name'=>$request->name,
    //     'email'=>$request->email,
    //     'password'=> Hash::make($request->password),
    //     'role'=>$request->role
    //  ]);

    //  return redirect('login/login');
    // }

    // public function Logout()
    // {
    //     Auth::logout();
    //     return redirect('/login');
    // }

}