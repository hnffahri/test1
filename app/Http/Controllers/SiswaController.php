<?php

namespace App\Http\Controllers;

use App\Models\siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = siswa::orderby('no_induk', 'desc')->paginate(5);
        return view('siswa/index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('siswa/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->session()->flash('no_induk', $request->no_induk);
        $request->session()->flash('nama', $request->nama);
        $request->session()->flash('alamat', $request->alamat);
        
        $request->validate([
            'no_induk' => 'required|numeric',
            'nama' => 'required',
            'alamat' => 'required',
            'foto' => 'required|mimes:jpeg,jpg,png'
        ],[
            'no_induk.numeric'=>'Nomer induk wajib diisi dengan angka',
            'no_induk.required'=>'Nomer induk wajib diisi',
            'nama.required'=>'Nama wajib diisi',
            'alamat.required'=>'Alamat wajib diisi',
            'foto.required'=>'Foto wajib diisi',
            'foto.mimes'=>'Foto hanya boleh berekstensi jpg, jpeg, png dan gif'
        ]);

        $foto_file = $request->file('foto');
        $foto_ekstensi = $foto_file->extension();
        $foto_nama = date('ymdhis') . "." . $foto_ekstensi;
        $foto_file->move(public_path('foto'), $foto_nama);

        $data = [
            'no_induk' => $request->input('no_induk'),
            'nama' => $request->input('nama'),
            'alamat' => $request->input('alamat'),
            'foto' => $foto_nama
        ];
        siswa::create($data);
        return redirect('siswa')->with('success', 'Data siswa berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = siswa::where('no_induk', $id)->first();
        return view('siswa/show')->with('data', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = siswa::where('no_induk', $id)->first();
        return view('siswa/edit')->with('data', $data);
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
            'no_induk.numeric'=>'Nomer induk wajib diisi dengan angka',
            'nama.required'=>'Nama wajib diisi',
            'alamat.required'=>'Alamat wajib diisi',
        ]);

        $data = [
            'nama' => $request->input('nama'),
            'alamat' => $request->input('alamat'),
        ];

        if($request->hasFile('foto')){
            $request->validate([
                'foto' => 'mimes:jpeg,jpg,png'
            ],[
                'foto.mimes'=>'Foto hanya boleh berekstensi jpg, jpeg, png dan gif'
            ]
            );
            $foto_file = $request->file('foto');
            $foto_ekstensi = $foto_file->extension();
            $foto_nama = date('ymdhis') . "." . $foto_ekstensi;
            $foto_file->move(public_path('foto'), $foto_nama);
            // sudah ter upload dir

            $data_foto = siswa::where('no_induk', $id)->first();
            File::delete(public_path('foto') .'/'. $data_foto->foto);
            
            $data['foto'] = $foto_nama;
        }

        siswa::where('no_induk', $id)->update($data);
        return redirect('/siswa')->with('success', 'Data siswa berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = siswa::where('no_induk', $id)->first();
        File::delete(public_path('foto') .'/'. $data->foto);

        siswa::where('no_induk', $id)->delete();
        return redirect('/siswa')->with('success', 'Data siswa berhasil dihapus');
    }
}
