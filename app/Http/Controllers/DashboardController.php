<?php

namespace App\Http\Controllers;

use App\Models\Daftar;
use App\Models\Dashboard;
use App\Models\Fasilitas;
use App\Models\Pengunjung;
use App\Models\Voting;
use App\Models\Image;
use Illuminate\Http\Request;
use App\Models\Wisatafasilitas;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $daftar = Daftar::latest();
        if (request('search')) {
            $daftar->where('nama', 'like', '%' . request('search') . '%')
                ->orWhere('kecamatan', 'like', '%' . request('search') . '%')
                ->orWhere('desa', 'like', '%' . request('search') . '%')
                ->orWhere('kategori', 'like', '%' . request('search') . '%');
        }
        return view('admin.a_daftar', [
            'title' => 'Daftar Wisata',
            'active' => 'a_daftar',
            'daftar' => $daftar->paginate(20),
        ]);
    }

    public function profile()
    {
        return view('admin.profil', [
            'title' => 'Profile',
        ]);
    }

    public function detail($id)
    {
        $daftar = daftar::find($id);
        foreach ($daftar as $value) {
            $arr = [];
            $fasilitas = DB::table('fasilitas_wisata')
                ->select('fasilitas.id', 'fasilitas.fasilitas', 'fasilitas_wisata.id_lokasi')
                ->join('fasilitas', 'fasilitas_wisata.id_fasilitas', '=', 'fasilitas.id')
                ->where('fasilitas_wisata.id_lokasi', '=', $daftar->id)
                ->get();
            foreach ($fasilitas as $fas) {
                array_push($arr, $fas->fasilitas);
            }
            $arr_image = [];
            $image = DB::table('image')
                ->join('daftars', 'image.id_lokasi', '=', 'daftars.id')
                ->select('image.*',)
                ->where('image.id_lokasi', '=', $daftar->id)
                ->get();
            foreach ($image as $img) {
                array_push($arr_image, $img->image);
            }
            $daftar->image = $arr_image;
            $votes = DB::table('votings')
                ->select('skor')
                ->where('id_wisata', '=', $daftar->id)
                ->get();
            $jumlah_votes = count($votes);
            $total_skor = 0;
            foreach ($votes  as $vote) {
                $total_skor += $vote->skor;
            }
            if ($jumlah_votes == 0) {
                $jumlah_votes = 1;
            }
            $skor = $total_skor / $jumlah_votes;
            $sisa = 5 - $skor;
            $daftar->fasilitas = $arr;
            $daftar->skor = $skor;
            $daftar->sisa = $sisa;
        }
        return view('admin.detail', [
            'title' => 'Detail Objek Wisata',
            'active' => 'a_info',
            // 'images' => $image,
            'daftar' => $daftar
        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $daftar = new daftar;
        return view('admin.addata', [
            'title' => 'Tambah Data',
            'fasilitas' => Fasilitas::all(),
            'active' => 'a_daftar', compact('daftar')
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
        $this->validate($request, [
            'nama' => 'required',
            'kecamatan' => 'required',
            'desa' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'jam' => 'required',
            'tiket' => 'required',
            'kategori' => 'required',
            'hari' => 'required',
            // 'fasilitas'   => 'required',
            'img' => 'required|mimes:jpg,jpeg,png',
            'deskripsi' => 'required',
        ]);
        $file_name = $request->img->getClientOriginalName();
        $image = $request->img->storeAs('thumbnail', $file_name);

        $lokasi = Daftar::create([
            'nama' => $request->nama,
            'kecamatan' => $request->kecamatan,
            'desa' => $request->desa,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'jam' => $request->jam,
            'tiket' => $request->tiket,
            'kategori' => $request->kategori,
            'hari' =>$request->hari,
            'img' => $image,
            'deskripsi' => $request->deskripsi,
        ]);
        $fasilitas = $request->fasilitas;
        foreach ($fasilitas as $value) {
            Wisatafasilitas::create([
                'id_fasilitas' => $value,
                'id_lokasi' => $lokasi->id
            ]);
        }
        // // $daftar->update($request->all());
        return redirect('/a_daftar')->with('pesan', 'Data Berhasil di Tambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dashboard  $dashboard
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $daftar = daftar::find($id);
        return view('admin.show', [
            'title' => 'Show Objek Wisata',
            'active' => 'a_daftar',
            'fasilitas' => Fasilitas::all(),
            'daftar' => $daftar
        ]);
    }

    public function edit($id)
    {
        $daftar = Daftar::find($id);
        $arr = [];
        $fasilitas = DB::table('fasilitas_wisata')
            ->select('fasilitas.id', 'fasilitas.fasilitas', 'fasilitas_wisata.id_lokasi')
            ->join('fasilitas', 'fasilitas_wisata.id_fasilitas', '=', 'fasilitas.id')
            ->where('fasilitas_wisata.id_lokasi', '=', $daftar->id)
            ->get();
        foreach ($fasilitas as $fas) {
            array_push($arr, $fas->id);
        }
        $arr_image = [];
            $image = DB::table('image')
                ->join('daftars', 'image.id_lokasi', '=', 'daftars.id')
                ->select('image.*',)
                ->where('image.id_lokasi', '=', $daftar->id)
                ->get();
            foreach ($image as $img) {
                array_push($arr_image, $img);
            }
            $daftar->image = $arr_image;

        $daftar['fasilitas'] = $arr;
        return view('admin.edit', [
            'title' => 'Tambah Data',
            'active' => 'a_daftar',
            'fasilitas' => Fasilitas::all(),
            'daftar' => $daftar
        ]);
    }

    public function tambah_pengunjung($id)
    {
        $pengunjung = DB::table('pengunjung')
            ->where('id_lokasi', '=', $id)
            ->sum('pengunjung.total');
        if ($pengunjung) {
            $total = $pengunjung;
        } else {
            $total = 0;
        }
        return view('admin.addpengunjung', [
            'title' => 'Tambah Pengunjung',
            'active' => 'a_daftar',
            'total' => $total,
            'id_lokasi' => $id,
        ]);
    }

    public function update_pengunjung(Request $request)
    {

        $request->validate([
            'jumlah' => 'required',
            'tahun' => 'required'
        ]);

        $pengunjung = DB::table('pengunjung')
            ->select('*')
            ->where([
                ['id_lokasi', '=', $request->id_lokasi],
                ['tahun', '=', $request->tahun]
            ])
            ->get()->first();
        if ($pengunjung) {
            $jumlah = $request->jumlah;
            $total = $pengunjung->total;
            DB::table('pengunjung')
                ->where([
                    ['id_lokasi', '=', $request->id_lokasi],
                    ['tahun', '=', $request->tahun]
                ])
                ->update(['total' => $jumlah + $total]);
        } else {
            Pengunjung::create([
                'total' => $request->jumlah,
                'tahun' => $request->tahun,
                'id_lokasi' => $request->id_lokasi,
            ]);
        }

        return redirect('/a_daftar')->with('pesan', 'Berhasil Menambah pengunjung');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'kecamatan' => 'required',
            'desa' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'jam' => 'required',
            'hari' => 'required',
            'tiket' => 'required',
            'fasilitas'   => 'required',
            'kategori' => 'required',
            // 'img'   => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'deskripsi' => 'required',
            // 'photos' => 'required'
        ]);
        $daftar = Daftar::find($id);
        if ($request->hasFile('img')) {
            $request->validate([
                'img' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',

            ]);
            $file_name = $request->img->getClientOriginalName();
            $image = $request->img->storeAs('thumbnail', $file_name);
            $daftar->img = $image;
        }


        if ($request->hasFile('photos')) {
            $photos = $request->file('photos');

            foreach ($photos as $photo) {
                $file_name = $photo->getClientOriginalName();
                $image = $photo->storeAs('thumbnail', $file_name);

                $image = Image::create(
                    [
                        'image' => $image,
                        'id_lokasi' => $id
                    ]
                );
                $image->save();
            }
        }
        $daftar->nama = $request->nama;
        $daftar->kecamatan = $request->kecamatan;
        $daftar->desa = $request->desa;
        $daftar->latitude = $request->latitude;
        $daftar->longitude = $request->longitude;
        $daftar->jam = $request->jam;
        $daftar->hari = $request->hari;
        DB::table('fasilitas_wisata')->where('id_lokasi', '=', $daftar->id)->delete();
        $fasilitas = $request->fasilitas;
        foreach ($fasilitas as $value) {
            Wisatafasilitas::create([
                'id_fasilitas' => $value,
                'id_lokasi' => $daftar->id
            ]);
        }
        $daftar->deskripsi = $request->deskripsi;
        $daftar->save();

        return redirect('/a_daftar')->with('pesan', 'Data Berhasil di Ubah');
    }

    public function destroy($id)
    {
        $daftar = Daftar::find($id);
        $daftar->delete();
        return redirect('/a_daftar')->with('pesan', 'Data Berhasil di Hapus');
    }
    
    public function destroyimage($id)
    {
        $daftar = Image::find($id);
        $daftar->delete();
        return back();
    }

    public function vote(Request $request)
    {
        $voted = DB::table('votings')
            ->where('id_wisata', '=', $request->id_lokasi)
            ->where('id_user', '=', auth()->user()->id)
            ->first();
        if ($voted) {
            DB::table('votings')
                ->where('id_wisata', '=', $request->id_lokasi)
                ->where('id_user', '=', auth()->user()->id)
                ->update(['skor' => $request->skor]);
        } else {
            Voting::create([
                'skor' => $request->skor,
                'id_wisata' => $request->id_lokasi,
                'id_user' => auth()->user()->id,
            ]);
        }

        return redirect('/a_maps')->with('pesan', 'Berhasil melakukan voting');
    }
}
