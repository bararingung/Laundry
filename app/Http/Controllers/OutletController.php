<?php

namespace App\Http\Controllers;

use App\Models\Outlet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;



class OutletController extends Controller
{
    public function index(Request $request){
        $keyword = $request->get('search');

        $Outlet = Outlet::where('nama', 'LIKE', "%$keyword%")
                        ->orWhere('alamat', 'LIKE', "%$keyword%")
                        ->orWhere('tlp', 'LIKE', "%$keyword%")
                        ->orderBy('created_at', 'desc')
                        ->paginate(5)->withQueryString();
        // $Outlet = Outlet::all();
        return view('product.Outlet', compact(['Outlet']));
    }

    public function create(){
        return view('product.tambahdata');
    }
    public function store(Request $request){
        $Outlet = Outlet::create($request->except(['_token', 'submit']));
        return redirect('outlet')->with('success', 'Outlet Successfully added!');

    }

    public function edit($id){

       $Outlet = DB::table('outlet')->where('id', $id)->first();
       $outlets = Outlet::all();

       return view('product.editOutlet', ['outlet'=>$Outlet]);

    }

    public function update(Request $request, $id){
    $outlet = Outlet::find($id);
    $outlet->update($request->except(['_token', 'submit']));

        return redirect('outlet')->with('success', 'Outlet Successfully changed!');
    }

    public function destroy($id){
        $outlet = Outlet::find($id);
        $outlet->delete();
        // return redirect('outlet')->with('info', 'Data berhasil dihapus!');
        return response()->json(['status' => 'Outlet Successfully deleted!']);
    }
}
