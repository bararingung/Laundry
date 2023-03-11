<?php

namespace App\Http\Controllers;

use App\Models\member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    public function index(Request $request){
        $keyword = $request->get('search');
        $member = member::where('nama', 'LIKE', "%$keyword%")
                        ->orWhere('alamat', 'LIKE', "%$keyword%")
                        ->orderBy('created_at', 'desc')
                        ->paginate(5)->withQueryString();
        // $member = member::all();
        return view('user.member', compact(['member']));
    }

    public function create(){
        return view('user.RegistrasiMember');
    }

    public function store(Request $request){
        $member = member::create($request->except(['_token', 'submit']));
        return redirect('Registrasi')->with('success', 'Member Successfully added!');
    }

    public function edit($id){
        $Member = DB::table('member')->where('id', $id)->first();
        $member = member::all();

        return view('user.editMember', ['Registrasi'=>$Member]);
    }
    public function update(Request $request, $id){
        $member = member::find($id);
        $member->update($request->except(['_token', 'submit'])
        );
    
            return redirect('Registrasi')->with('success', 'Member Successfully changed!');
        }
    

    public function destroy($id){
        $member = member::find($id);
        $member->delete();

        // return redirect('Registrasi')->with('info', 'Data berhasil dihapus!');
        return response()->json(['status' => 'Member Successfully deleted!']);

    }
}
