<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Http\Controllers\Kasir;

class Kasir extends Controller
{
    public function index(){
       return view('Beranda');
    }
}
