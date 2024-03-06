<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HalamanController extends Controller
{
    //
    function index(){
        return view("halaman/index");
    }
    
    function tentang(){
      return view("halaman/tentang");
    }
    
    function kontak(){
      $judul = 'Halaman Kontak Dari Controller';
      $data = [
        'judul' => 'Ini Adalah Kontak',
        'kontak' => [
          'email' => 'jamal@gmail.com',
          'youtube' => 'Jamal Chanel'
        ]
      ];
      return view("halaman/kontak")->with($data);
    }
}
