<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;

class MahasiswaController extends Controller
{
    //
   public function index()
   {
       $data['mahasiswa'] = Mahasiswa::all();
       return view('mahasiswa.index', $data);
   } 

   public function create()
   {
       return view('mahasiswa.tambah');
   }

   public function store(Request $request)
   {
        $request->validate([
            'nim' => 'unique:mahasiswa,nim'
        ]);

        $data = [
            'nim' => $request->nim,
            'nama_lengkap' => $request->nama_lengkap,
            'kelas' => $request->kelas,
            'prodi' => $request->prodi,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'alamat' => $request->alamat,

            
        ];

        Mahasiswa::create($data);

        return redirect()->route('mahasiswa.index')->with('berhasil', 'Data Mahasiswa telah beerhasil ditambahkan!');
   }

   public function edit($id)
   {
       $data['mahasiswa'] = Mahasiswa::find($id);

       return view('mahasiswa.edit', $data);
   }

   public function update(Request $request, $id)
   {
    $mahasiswa = Mahasiswa::findOrFail($id);

    $request->validate([
        'nim' => "unique:mahasiswa,nim,$mahasiswa->id"
    ]);

    $data = [
        'nim' => $request->nim,
        'nama_lengkap' => $request->nama_lengkap,
        'kelas' => $request->kelas,
        'prodi' => $request->prodi,
        'jenis_kelamin' => $request->jenis_kelamin,
        'tempat_lahir' => $request->tempat_lahir,
        'tanggal_lahir' => $request->tanggal_lahir,
        'alamat' => $request->alamat,  
    ];

    $mahasiswa->update($data);

    return redirect()->route('mahasiswa.index')->with('berhasil', 'Data Mahasiswa telah beerhasil diubah!');
   }

   public function destroy($id)
   {
       $mahasiswa = Mahasiswa::find($id);

       $mahasiswa->delete();

       return redirect()->route('mahasiswa.index')->with('berhasil', 'Data Mahasiswa telah berhasil dihapus!');
   }
}
