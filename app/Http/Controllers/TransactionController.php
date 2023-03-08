<?php

namespace App\Http\Controllers;

use App\Models\member;
use App\Models\Outlet;
use Illuminate\Http\Request;
use App\Models\packet;
use App\Models\transaksi;

class TransactionController extends Controller
{
    public function index(){
        $transaksi = transaksi::with(['outlet','member','packets'])->get();
        return view('transaksi.Transaction', compact('transaksi'));
    }


    public function create(){
        $Outlet = Outlet::get();
        $member = member::get();
        $packets = packet::get();



        return view('transaksi.addtransaksi', compact(['Outlet', 'member', 'packets']));

    }

    public function store(Request $request){
        $transaksi = transaksi::create($request->except(['_token', 'submit']));

        $biayaTambahan = $transaksi->GetTotalHarga() + $transaksi->biaya_tambahan;

        $hargadiskon = $transaksi->diskon / 100 * $biayaTambahan;

        $hargapajak =  $transaksi->pajak / 100 * $biayaTambahan;

        $transaksi->jumlah_harga = $biayaTambahan - $hargadiskon + $hargapajak;
        $transaksi->save();
        return redirect('Transaction');
    }

    public function edit($id){
        $Outlet = Outlet::all();
        $packet = packet::all();
        $member = member::all();
        $transaksi = transaksi::find($id);

        return view('transaksi.edittransaksi', compact('transaksi','member', 'packet', 'Outlet'));
    }

    public function update(Request $request, $id){
          $transaksi = transaksi::find($id);
          $transaksi->update($request->except(['_token', 'submit']));

          $biayaTambahan = $transaksi->GetTotalHarga() + $transaksi->biaya_tambahan;

          $hargadiskon = $transaksi->diskon / 100 * $biayaTambahan;
  
          $hargapajak =  $transaksi->pajak / 100 * $biayaTambahan;
  
          $transaksi->jumlah_harga = $biayaTambahan - $hargadiskon + $hargapajak;
          $transaksi->save();

          return redirect('Transaction');
    }

    public function destroy($id){
        $transaksi = transaksi::find($id);
        $transaksi->delete();

        return redirect('Transaction');
    }
}
