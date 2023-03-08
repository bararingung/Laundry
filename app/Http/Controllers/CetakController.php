<?php

namespace App\Http\Controllers;

use App\Models\member;
use App\Models\Outlet;
use App\Models\packet;
use App\Models\transaksi;
use Illuminate\Http\Request;

class CetakController extends Controller
{
    public function show($id){
        $Outlet = Outlet::all();
        $packet = packet::all();
        $member = member::all();
        $transaksi = transaksi::find($id);
        return view('transaksi.cetaktransaksi', compact('transaksi', 'member', 'packet', 'Outlet'));
    }
}
