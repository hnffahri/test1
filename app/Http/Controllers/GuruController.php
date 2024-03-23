<?php

namespace App\Http\Controllers;

use App\Models\guru;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    public function guru()
    {
        $data = guru::orderby('created_at', 'desc')->paginate(2);
        return view('guru/index')->with('data', $data);
    }
}
