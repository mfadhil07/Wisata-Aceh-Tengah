<?php

namespace App\Http\Controllers;

use App\Models\Daftar;
use App\Models\DaftarAdmin;
use Illuminate\Http\Request;

class Daftar_AdminController extends Controller
{
    public function index()
    {
        $daftar = Daftar::latest();
        if (request('search')) {
            $daftar->where('nama', 'like', '%' . request('search') . '%')
                ->orWhere('kecamatan', 'like', '%' . request('search') . '%')
                ->orWhere('desa', 'like', '%' . request('search') . '%');
        }
        return view('admin.a_daftar', [
            'title' => 'Daftar Wisata',
            'active' => 'a_daftar',
            // 'daftar' => Daftar::all(),
            'daftar' => $daftar->paginate(10),
        ]);
    }

    // public function tambah(Request $request)
    // {
    //     return view('admin.addata', [
    //         'active' => 'daftar',
    //         'title' => 'Tambah Data',
    //     ]);
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|unique:nama',
            'kecamatan' => 'require',
            'desa' => 'required',
            'latitude' => 'required',
            'longitute' => 'required',

        ]);
        daftar::create($validatedData);
        return redirect('/a_daftar')->with('success', 'New data seccessfull!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DaftarAdmin  $daftarAdmin
     * @return \Illuminate\Http\Response
     */
    public function show(DaftarAdmin $daftar)
    {
        return $daftar;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DaftarAdmin  $daftarAdmin
     * @return \Illuminate\Http\Response
     */
    public function edit(DaftarAdmin $daftarAdmin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DaftarAdmin  $daftarAdmin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DaftarAdmin $daftarAdmin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DaftarAdmin  $daftarAdmin
     * @return \Illuminate\Http\Response
     */
    public function destroy(DaftarAdmin $daftarAdmin)
    {
        //
    }
}
