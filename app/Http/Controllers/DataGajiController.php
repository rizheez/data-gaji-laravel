<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\DataGaji;
use Illuminate\Http\Request;

use PDF;

class DataGajiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = DataGaji::all();
        setlocale(LC_ALL, 'id_ID');
        return view('data', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $gajiMap = [
            'direktur' => 15000000,
            'manager' => 10000000,
            'supervisor' => 6000000,
            'staf' => 3500000
        ];

        $denda = 20000;
        $jabatan = $request->input('jabatan');
        $telat = $request->input('telat');
        $pinalti = $telat * $denda;
        $totalGaji = 0;
        $nominalGaji = 0;

        $date = $request->input('gajibulan');
        $tanggal = Carbon::create($date, 1)->format('Y-m-d');

        if (isset($gajiMap[$jabatan])) {
            $nominalGaji += $gajiMap[$jabatan];
            if ($pinalti >= 0) {
                $totalGaji += $gajiMap[$jabatan] - $pinalti;
            } else {
                $totalGaji += $gajiMap[$jabatan];
            }
        }

        $gaji = new DataGaji;
        $gaji->nik = $request->input('nik');
        $gaji->nama = $request->input('nama');
        $gaji->jabatan = $jabatan;
        $gaji->gajibulan = $tanggal;
        $gaji->telat = $telat;
        $gaji->nominalgaji = $nominalGaji;
        $gaji->denda = $pinalti;
        $gaji->totalgaji = $totalGaji;
        $gaji->save();

        return redirect()->back()->with('success', 'Data gaji berhasil ditambahkan.');
    }
}
