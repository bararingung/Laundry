<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Outlet extends Model
{
    use HasFactory;
    protected $table = 'Outlet';
    protected $guarded = [];


    public function packets(){
        return $this->belongsTo(packet::class);
    }
    public function transaksi(){
        return $this->belongsTo(Transaksi::class, 'id_transaksi');
    }
}
