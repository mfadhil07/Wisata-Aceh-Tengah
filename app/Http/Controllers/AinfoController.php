<?php

namespace App\Http\Controllers;

use App\Models\A_Info;
use App\Models\Daftar;
use App\Models\Fasilitas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AinfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $daftar = DB::table('daftars')
            ->paginate(9);
        if (request('search')) {
            $daftar = DB::table('daftars')
                ->where('nama', 'like', '%' . request('search') . '%')
                ->orWhere('kecamatan', 'like', '%' . request('search') . '%')
                ->orWhere('desa', 'like', '%' . request('search') . '%')
                ->orWhere('kategori', 'like', '%' . request('search') . '%')
                ->paginate(9);
        }
        foreach ($daftar as $value) {
            $arr = [];
            $fasilitas = DB::table('fasilitas_wisata')
                ->select('fasilitas.id', 'fasilitas.fasilitas', 'fasilitas_wisata.id_lokasi')
                ->join('fasilitas', 'fasilitas_wisata.id_fasilitas', '=', 'fasilitas.id')
                ->where('fasilitas_wisata.id_lokasi', '=', $value->id)
                ->get();
            foreach ($fasilitas as $fas) {
                array_push($arr, $fas->fasilitas);
            }
            $value->fasilitas = $arr;
        }
        return view('admin.a_info', [
            'title' => 'Info Wisata',
            'active' => 'a_info',
            // 'daftar' => $daftar->paginate(9),
            'daftar' => $daftar,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        return view('admin.addinfo', [
            'title' => 'Tambah Info Wisata',
            'active' => 'a_info'

        ]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $valid = $request->validate([
            'nama' => 'required',
            'jam' => 'required',
            'image' => 'required|file',
            'deskripsi' => 'required',
            'tiket' => 'required',
        ]);
        A_Info::create($valid);
        return redirect('/a_info')->with('pesan', 'Data Berhasil di Tambah');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\A_Info  $a_Info
     * @return \Illuminate\Http\Response
     */
    public function show(A_Info $a_Info)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\A_Info  $a_Info
     * @return \Illuminate\Http\Response
     */
    public function edit(A_Info $a_Info)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\A_Info  $a_Info
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, A_Info $a_Info)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\A_Info  $a_Info
     * @return \Illuminate\Http\Response
     */
    public function destroy(A_Info $a_Info)
    {
        //
    }
}
