<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class SessionController extends Controller
{
    function index(){
        return view("sesi/index");
    }
    function login(Request $request){
        $request->validate([
            'email'=>'required',
            'password'=>'required',
        ],[
            'email.required'=>'Email wajib diisi',
            'password.required'=>'Password wajib diisi'
        ]);

        $infologin = [
            'email'=> $request->email,
            'password'=> $request->password
        ];

        if(Auth::attempt($infologin)){
            return redirect('siswa')->with('success', 'Berhasil login');
        }else{
            $request->session()->flash('email', $request->email);
            return redirect('sesi')->withErrors('Email dan password tidak valid');
        }
    }

    function logout(){
        Auth::logout();
        return redirect('sesi')->with('success', 'Berhasil logout');
    }

    function register(){
        return view("sesi/register");
    }
    
    function lupapassword(){
        return view("sesi/lupa-password");
    }

    function create(Request $request){
        $request->session()->flash('name', $request->name);
        $request->session()->flash('email', $request->email);
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:6'
        ],[
            'name.required'=>'Nama wajib diisi',
            'email.required'=>'Email wajib diisi',
            'email.email'=>'Gunakan email yang valid',
            'email.unique'=>'Email sudah digunakan',
            'password.required'=>'Password wajib diisi',
            'password.min'=>'Minimum password wajib diisi dengan minimum 6 karakter'
        ]);

        $data = [
            'name'=> $request->name,
            'email'=> $request->email,
            'password'=> Hash::make($request->password)
        ];

        User::create($data);

        $infologin = [
            'name'=> $request->name,
            'email'=> $request->email,
            'password'=> $request->password
        ];

        if(Auth::attempt($infologin)){
            return redirect('siswa')->with('success', Auth::user()->name . ' Berhasil login');
        }else{
            return redirect('sesi')->withErrors('Email dan password tidak valid');
        }
    }
}
