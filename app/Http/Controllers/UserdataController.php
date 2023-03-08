<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserdataController extends Controller
{
    public function index(){

        $user = User::all();
        return view('user.Userdata', compact(['user']));
    }

    public function create(){
        return view('user.adduser');
    }

    public function store(Request $request){
        $user = User::create($request->except(['_token','submit']));
        return redirect('Userdata')->with('success', 'Data Successfully added!');
    }

    public function edit($id){
        $user = User::find($id);

        return view('user.editUser', ['Userdata'=> $user]);
    }

    public function update(Request $request, $id){
        $user = User::find($id);
        $user->update($request->except(['_token', 'submit']));

        return redirect('Userdata')->with('success', 'Data Successfully changed!');
    }

    public function destroy($id){
        $user = User::find($id);
        $user->delete();

        // return redirect('Userdata')->with('info', 'Data berhasil dihapus!');
        return response()->json(['status' => 'Data Successfully deleted!']);
    }
}
