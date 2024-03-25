<?php

namespace App\Http\Controllers;

use App\Models\guru;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    public function index()
    {
        $data = guru::orderby('created_at', 'desc')->paginate(2);
        return view('guru/index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('guru/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->session()->flash('nip', $request->nip);
        $request->session()->flash('nama', $request->nama);
        $request->session()->flash('alamat', $request->alamat);
        
        $request->validate([
            'nip' => 'required|numeric',
            'nama' => 'required',
            'alamat' => 'required'
        ],[
            'nip.numeric'=>'Nip wajib diisi dengan angka',
            'nip.required'=>'Nip wajib diisi',
            'nama.required'=>'Nama wajib diisi',
            'alamat.required'=>'Alamat wajib diisi'
        ]);

        $data = [
            'nip' => $request->input('nip'),
            'nama' => $request->input('nama'),
            'alamat' => $request->input('alamat')
        ];

        guru::create($data);
        return redirect('guru')->with('success', 'Data guru berhasil ditambahkan');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = guru::where('nip', $id)->first();
        return view('guru/edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required'
        ],[
            'nip.numeric'=>'Nomer induk wajib diisi dengan angka',
            'nama.required'=>'Nama wajib diisi',
            'alamat.required'=>'Alamat wajib diisi',
        ]);

        $data = [
            'nama' => $request->input('nama'),
            'alamat' => $request->input('alamat'),
        ];

        guru::where('nip', $id)->update($data);
        return redirect('/guru')->with('success', 'Data guru berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = guru::where('nip', $id)->first();
        guru::where('nip', $id)->delete();
        return redirect('/guru')->with('success', 'Data guru berhasil dihapus');
    }
}
