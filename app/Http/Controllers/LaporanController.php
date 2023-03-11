<?php

namespace App\Http\Controllers;

use App\Models\transaksi;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index(){

        $transaksi = transaksi::all();
        return view('laporan.tampillaporan',compact('transaksi'));
    }

    public function create(Request $request){
        $tgl = $request->input('tgl');
        $bataswaktu = $request->input('batas_waktu');

        $transaksi = transaksi::whereBetween('tgl', [$tgl, $bataswaktu])->get();

        return view('laporan.cetak', [
           'transaksi' =>$transaksi,
           'tgl'=> $tgl,
           'batas_waktu' => $bataswaktu, 
        ]);
    }
}
