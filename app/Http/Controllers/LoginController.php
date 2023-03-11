<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        // if($user = Auth::user()){
        //     if($user->role == '1'){
        //         return redirect()->intended('beranda');
        //     }elseif($user->role == '2'){
        //         return redirect()->intended('kasir');
        //     }elseif($user->role == '3'){
        //         return redirect()->intended('owner');
        //     }
        // }

        return view('login.view_login');
    }

    public function proses(Request $request){
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $kredensial = $request->only('username','password');

        if(Auth::attempt($kredensial)){
        // $request->session()->regenerate();
            $user = Auth::user();
            if($user = Auth::user()){
                if($user->role == 'admin'){
                    return redirect()->intended('beranda');
                }elseif($user->role == 'cashier'){
                    return redirect()->intended('kasir');
                }elseif($user->role == 'owner'){
                    return redirect()->intended('owner');
                }
            }

            return redirect()->intended('/');

        }

        return back()->withErrors([
            'username' => 'Username atau passsword salah',
        ])->onlyInput('username');
    }

    public function logout(Request $request)
    {
        Auth::logout();
    
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/');
    }
}

?>
