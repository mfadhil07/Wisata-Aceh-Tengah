<?php

namespace App\Http\Controllers;

use App\Models\Daftar;
use App\Models\Fasilitas;
use App\Models\image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use illuminate\Pagination\Paginator;
use Illuminate\Http\Resources\Json\PaginatedResourceResponse;
use Pengunjung;

class DaftarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function home()
    {
        $bahari = DB::table('daftars')
            ->where('kategori', 'Bahari')->paginate(6);
        $pemandangan = DB::table('daftars')
            ->where('kategori', 'Pemandangan')->paginate(6);
        $sejarah = DB::table('daftars')
            ->where('kategori', 'Sejarah')->paginate(6);
        $daftar = DB::table('daftars')
            ->paginate(9);

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
            $pengunjung = DB::table('pengunjung')
                ->select('pengunjung', 'pengunjung',)
                ->where('pengunjung.id_lokasi', '=', $value->id)
                ->sum('pengunjung.total');
            $value->pengunjung = $pengunjung;
            $votes = DB::table('votings')
                ->select('skor')
                ->where('id_wisata', '=', $value->id)
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
            $value->fasilitas = $arr;
            $value->skor = $skor;
            $value->sisa = $sisa;
        }
        return view('home', [
            'title' => 'Home',
            'active' => 'home',
            'daftar' => $daftar,
            'bahari' => $bahari,
            'sejarah' => $sejarah,
            'pemandangan' => $pemandangan
        ]);
    }
    public function index()
    {
        $daftar = Daftar::latest();
        if (request('search')) {
            $daftar = DB::table('daftars')
                ->where('nama', 'like', '%' . request('search') . '%')
                ->orWhere('kecamatan', 'like', '%' . request('search') . '%')
                ->orWhere('kategori', 'like', '%' . request('search') . '%')
                ->orWhere('desa', 'like', '%' . request('search') . '%')
                ->orWhere('kategori', 'like', '%' . request('search') . '%');
        }
        return view('daftar', [
            'title' => 'Daftar Wisata Aceh Tengah',
            'active' => 'daftar',
            'daftar' => $daftar->paginate(20),
            //          Daftar::with(['namatabel'],[namatabel])->get() Eagel Loading
        ]);
    }

    public function maps()
    {
        $daftar = DB::table('daftars')
            ->paginate(3);
        if (request('search')) {
            $daftar = DB::table('daftars')
                ->where('nama', 'like', '%' . request('search') . '%')
                ->orWhere('kecamatan', 'like', '%' . request('search') . '%')
                ->orWhere('kategori', 'like', '%' . request('search') . '%')
                ->orWhere('desa', 'like', '%' . request('search') . '%')
                ->paginate(10);
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
            $votes = DB::table('votings')
                ->select('skor')
                ->where('id_wisata', '=', $value->id)
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
            $value->fasilitas = $arr;
            $value->skor = $skor;
            $value->sisa = $sisa;
        }
        return view('map', [
            'title' => 'Maps',
            'active' => 'maps',
            'fasilitas' => Fasilitas::all(),
            'daftar' => $daftar,
            // 'daftar' => $daftar->paginate(2)
        ]);
    }
    public function info()
    {
        $daftar = DB::table('daftars')
            ->paginate(12);
        if (request('search')) {
            $daftar = DB::table('daftars')
                ->where('nama', 'like', '%' . request('search') . '%')
                ->orWhere('kecamatan', 'like', '%' . request('search') . '%')
                ->orWhere('desa', 'like', '%' . request('search') . '%')
                ->orWhere('kategori', 'like', '%' . request('search') . '%')
                ->paginate(15);
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
        return view('info', [
            'title' => 'Info Wisata',
            'active' => 'info',
            'daftar' => $daftar,
        ]);
    }

    public function json()
    {        
        if (request('search')) {
            $features = DB::table('daftars')
                ->where('nama', 'like', '%' . request('search') . '%')
                ->orWhere('kecamatan', 'like', '%' . request('search') . '%')
                ->orWhere('desa', 'like', '%' . request('search') . '%')
                ->orWhere('kategori', 'like', '%' . request('search') . '%')
                ->get();
        } else {
            $features = DB::table('daftars')
            ->get();
        }
        foreach ($features as $key => $value) {
            $json_features[] = [
                'type' => 'Feature',
                'properties' => [
                    'id' => $value->id,
                    'name' => $value->nama,
                    'kecamatan' => $value->kecamatan,
                    'desa' => $value->desa,
                    'kategori' => $value->kategori,
                ],
                'geometry' => [
                    'type' => 'Point',
                    'coordinates' => [$value->longitude, $value->latitude]
                ]
            ];
        }
        $response = [
            'type' => 'FeatureCollection',
            'features' => $json_features

        ];
        return response($response, 200);
    }

    public function detail_lokasi($id)
    {
        $daftar = Daftar::find($id);
        $arr = [];
        $fasilitas = DB::table('fasilitas_wisata')
            ->select('fasilitas.id', 'fasilitas.fasilitas', 'fasilitas_wisata.id_lokasi')
            ->join('fasilitas', 'fasilitas_wisata.id_fasilitas', '=', 'fasilitas.id')
            ->where('fasilitas_wisata.id_lokasi', '=', $daftar->id)
            ->get();
        foreach ($fasilitas as $fas) {
            array_push($arr, $fas->fasilitas);
        }

        $daftar['fasilitasString'] = implode(", ", $arr);
        $daftar['fasilitas'] = $arr;
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
        $daftar['skor'] = $skor;
        $daftar['sisa'] = $sisa;
        return response($daftar, 200);
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
        // $image = Image::all();
        return view( 'detail', [
            'title' => 'Detail Objek Wisata',
            'active' => 'info',
            // 'images' => $image,
            'daftar' => $daftar
        ]);
    }

    public function rute()
    {
        return view('rute', [
            'title' => 'Rute',
            'active' => 'rute',
            'daftar' => Daftar::all(),
        ]);
    }

    public function updaftar()
    {
    }

    public function create()
    {
        //
    }
}
