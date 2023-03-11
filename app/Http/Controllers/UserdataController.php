<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserdataController extends Controller
{
    public function index(Request $request){
        $keyword = $request->get('search');

        $user = User::where('name', 'LIKE', "%$keyword%")
                        ->orWhere('email', 'LIKE', "%$keyword%")
                        ->orWhere('username', 'LIKE', "%$keyword%")
                        // ->orderBy('created_at', 'desc')
                        ->paginate(5)->withQueryString();
        // $user = User::all();
        return view('user.Userdata', compact(['user']));
    }

    public function create(){
        return view('user.adduser');
    }

    public function store(Request $request){
        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'role' => $request->role,
            'password' => Hash::make($request->password),
        ]);
        // $user = User::create($request->except(['_token','submit']));
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
