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

        $direktur = 15000000;
        $manager = 10000000;
        $supervisor = 6000000;
        $staf = 3500000;
        $denda = 20000;
        $jabatan = $request->input('jabatan');
        $pinalti = $request->input('telat') * $denda;
        $totalGaji = 0;
        $nominalGaji = 0;

        $date = $request->input('gajibulan');

        $tanggal = Carbon::create($date, 1)->format('Y-m-d');

        if ($jabatan == 'direktur') {
            $nominalGaji += $direktur;
            if ($pinalti >= 0) {
                $total = $direktur - $pinalti;
                $totalGaji += $total;
            } else {
                $totalGaji += $direktur;
            }
        } else if ($jabatan == 'manager') {
            $nominalGaji += $manager;
            if ($pinalti >= 0) {
                // $totalDenda = $pinalti * $denda;
                $total = $manager - $pinalti;
                $totalGaji += $total;
            } else {
                $totalGaji += $manager;
            }
        } else if ($jabatan == 'supervisor') {
            $nominalGaji += $supervisor;
            if ($pinalti >= 0) {
                // $totalDenda = $pinalti * $denda;
                $total = $supervisor - $pinalti;
                $totalGaji += $total;
            } else {
                $totalGaji += $supervisor;
            }
        } else if ($jabatan == 'staf') {
            $nominalGaji += $staf;
            if ($pinalti >= 0) {
                // $totalDenda = $pinalti * $denda;
                $total = $staf - $pinalti;
                $totalGaji += $total;
            } else {
                $totalGaji += $staf;
            }
        }

        $gaji = new DataGaji;
        $gaji->nik = $request->input('nik');
        $gaji->nama = $request->input('nama');
        $gaji->jabatan = $jabatan;
        $gaji->gajibulan = $tanggal;
        $gaji->telat = $request->input('telat');
        $gaji->nominalgaji = $nominalGaji;
        $gaji->denda = $pinalti;
        $gaji->totalgaji = $totalGaji;
        $gaji->save();

        // set pesan sukses ke session dan redirect ke tampilan data gaji karyawan
        return redirect()->back()->with('success', 'Data gaji berhasil ditambahkan.');
    }

    public function createPdf()
    {
    }
}
