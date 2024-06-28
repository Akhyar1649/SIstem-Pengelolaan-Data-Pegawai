<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $perPage = $request->input('per_page', 10);
        $divisi = $request->input('divisi', 'All');
        $search = $request->input('search', '');

        $query = DB::table('pegawais');

        if ($divisi !== 'All') {
            $query->where('divisi', $divisi);
        }

        if (!empty($search)) {
            $query->where('nama', 'like', '%' . $search . '%');
        }

        $pegawai = $query->paginate($perPage);

        return view('pages.index', [
            'pegawai' => $pegawai,
            'perPage' => $perPage,
            'divisi' => $divisi,
            'search' => $search,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:100',
            'umur' => 'required|integer',
            'divisi' => 'required|string|max:100',
            'jabatan' => 'required|string|max:100',
            'alamat' => 'required|string|max:255',
            'nomor_telepon' => 'required|string|max:20',
            'email' => 'required|string|email|max:100|unique:pegawais,email',
        ], [
            'required' => 'Kolom :attribute harus diisi.',
            'string' => 'Kolom :attribute harus berupa teks.',
            'integer' => 'Kolom :attribute harus berupa angka.',
            'max' => 'Kolom :attribute tidak boleh lebih dari :max karakter.',
            'email' => 'Kolom :attribute harus berupa alamat email yang valid.',
            'unique' => 'Kolom :attribute sudah terdaftar.',
        ]);

        Pegawai::create($request->all());

        return redirect('/pegawai')->with('success', 'Pegawai berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pegawai $pegawai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $pegawai = Pegawai::find($id);
        return view('pages.form', ['pegawai' => $pegawai]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:100',
            'umur' => 'required|integer',
            'divisi' => 'required|string|max:100',
            'jabatan' => 'required|string|max:100',
            'alamat' => 'required|string|max:255',
            'nomor_telepon' => 'required|string|max:20',
            'email' => 'required|string|email|max:100|unique:pegawais,email,'.$id,
        ], [
            'required' => 'Kolom :attribute harus diisi.',
            'string' => 'Kolom :attribute harus berupa teks.',
            'integer' => 'Kolom :attribute harus berupa angka.',
            'max' => 'Kolom :attribute tidak boleh lebih dari :max karakter.',
            'email' => 'Kolom :attribute harus berupa alamat email yang valid.',
            'unique' => 'Kolom :attribute sudah terdaftar.',
        ]);

        $pegawai = Pegawai::find($id);
        $pegawai->update($request->all());

        return redirect('/pegawai')->with('success', 'Pegawai berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        DB::table('pegawais')->where('id', $id)->delete();
        return redirect('/pegawai');
    }
}
