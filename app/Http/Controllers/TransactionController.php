<?php

namespace App\Http\Controllers;

use App\Models\member;
use App\Models\Outlet;
use Illuminate\Http\Request;
use App\Models\packet;
use App\Models\transaksi;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    public function index(Request $request){

        if ($keyword = $request->get('search')) {
            $transaksi = transaksi::where('tgl', 'LIKE', "%$keyword%")
            ->orWhere('batas_waktu', 'LIKE', "%$keyword%")
            ->orWhere('tgl_bayar', 'LIKE', "%$keyword%")
            ->get();
        }else {
            $transaksi = transaksi::with(['outlet','member','packets'])->orderBy('created_at', 'desc')->paginate(5)->withQueryString();
        }
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
        return redirect('Transaction')->with('success', 'Transaction Successfully changed!');;
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

          return redirect('Transaction')->with('success', 'Transaction Successfully changed!');;
    }

    public function destroy($id){
        $transaksi = transaksi::find($id);
        $transaksi->delete();

        // return redirect('Transaction');
        return response()->json(['status' => 'Transaction Successfully deleted!']);
    }
}
