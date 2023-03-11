<?php

namespace App\Http\Controllers;

use App\Models\member;
use App\Models\Outlet;
use App\Models\packet;
use App\Models\transaksi;
use App\Models\User;
use Illuminate\Http\Request;


class OwnerController extends Controller
{
    public function index(){
        $member = member::all();
        $outlet = Outlet::all();
        $user = User::all();
        $paket = packet::all();
        $transaksi = transaksi::all();
        return view('Beranda', compact(['member','outlet','user','transaksi','paket']));
    }
}
