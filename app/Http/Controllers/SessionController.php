<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Str;
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
            return redirect('siswa');
        }else{
            return redirect('sesi')->withErrors('Email dan password tidak valid');
        }
    }
    
    function lupapassword(){
        return view("sesi/lupa-password");
    }
    
    function kirimemail(Request $request){
        $request->session()->flash('email', $request->email);
        $request->validate([
            'email'=>'required|email:users'
        ],[
            'email.required'=>'Email wajib diisi',
            'email.email'=>'Gunakan email yang valid',
        ]);

        $data = Password::sendResetLink(
            $request->only('email')
        );

        if($data === Password::RESET_LINK_SENT){
            return redirect('sesi/lupa-password')->with('success', 'Buka email anda');
        }else{
            return redirect('sesi/lupa-password')->withErrors('Email tidak terdaftar');
        }
        // return $data === Password::RESET_LINK_SENT
        // ? back()->with('success', 'Buka email anda')
        // : back()->withErrors('Email tidak terdaftar');

    }
    function resetpassword(Request $request){
        return view("sesi/reset-password", ['request' => $request]);
    }
    function updatepassword(Request $request){
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ],[
            'token.required'=>'Tidak ada token',
            'email.required'=>'Tidak ada email',
            'password.required'=>'Tidak ada password',
            'password.min'=>'Minimum password wajib diisi dengan minimum 8 karakter',
            'password.confirmed'=>'Konfirmasi password tidak sesuai'
        ]);
    
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function (User $user, string $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));
                $user->save();
                event(new PasswordReset($user));
            }
        );
        // if($status === Password::PASSWORD_RESET){
        //     return redirect('sesi')->with('success', 'Reset Password berhasil');
        // }else{
        //     back()->withErrors('Token tidak valid');
        // }
        return $status === Password::PASSWORD_RESET
                    ? redirect('sesi')->with('success', 'Reset Password berhasil')
                    : back()->withErrors('Token tidak valid');
    }


}
