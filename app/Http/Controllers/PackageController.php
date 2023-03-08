<?php

namespace App\Http\Controllers;

use App\Models\Outlet;
use App\Models\packet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class PackageController extends Controller
{
    public function index(){
        $produk = packet::with('outlet')->get();
        return view('product.Package', compact('produk'));
    }

    public function create(){
        $Outlet = Outlet::get();
        return view('product.addpacket', compact('Outlet'));
    }

    public function store(Request $request){
        $packet = packet::create($request->except(['_token', 'submit']));
        return redirect('Package')->with('success', 'Data berhasil ditambahkan!');

    }

    public function edit($id){
        $Outlet = Outlet::all();
        $packet = packet::find($id);
        return view('product.editpacket', compact('packet', 'Outlet'));
    }

    public function update(Request $request, $id){
        $packet = packet::find($id);
        $packet->update($request->except(['_token', 'submit']));
        return redirect('Package')->with('success', 'Data berhasil diubah!');
    }

    public function destroy($id){
        $packet = packet::find($id);
        $packet->delete();

        return redirect('Package')->with('info', 'Data berhasil dihapus!');
    }
}
