<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\StoreMahasiswaRequest;
use App\Http\Requests\UpdateMahasiswaRequest;
use App\Models\Mahasiswa;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class MahasiswaController extends Controller
{
    public function index(Request $request)
    {
        $mahasiswas = DB::table('mahasiswas')
            ->when($request->input('nim'), function ($query) use ($request) {
                    return $query->where('nim', 'like', '%' . $request->input('nim') . '%')
                                 ->orWhere('nama', 'like', '%' . $request->input('nim') . '%');
        
            })
            ->select('id','nama', 'nim', 'nohp', 'matakuliah', 'jam', 'saran')
            ->orderBy('nim')
            ->paginate(10);
        return view('pages.mahasiswa.index', compact('mahasiswas'));
    }

    public function create()
    {
        return view('pages.mahasiswa.create');
    }

    public function store(StoreMahasiswaRequest $request)
    {
        Mahasiswa::create([
            'nama' => $request['nama'],
            'nim' => $request['nim'],
            'nohp' => $request['nohp'],
            'matakuliah' => $request['matakuliah'],
            'jam' => $request['jam'],
            'saran' => $request['saran'],
        ]);

        return redirect(route('mahasiswa.index'))->with('success', 'Data berhasil disimpan');
    }

    public function edit(Mahasiswa $mahasiswa)
    {
        return view('pages.mahasiswa.edit')->with('mahasiswa', $mahasiswa);
    }

    public function update(UpdateMahasiswaRequest $request, Mahasiswa $mahasiswa)
    {
        $validate = $request->validated();
        $mahasiswa->update($validate);
        return redirect()->route('mahasiswa.index')->with('success', 'Edit Data Successfully');
    }

    public function destroy(Mahasiswa $mahasiswa)
    {
        $mahasiswa->delete();
        return redirect()->route('mahasiswa.index')->with('success', 'Delete Data Successfully');
    }
}
