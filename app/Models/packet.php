<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class packet extends Model
{
    use HasFactory;
    protected $table = 'packets';
    protected $guarded = [];

    public function outlet(){
        return $this->belongsTo(Outlet::class, 'id_outlet');
    }

    public function transaksi(){
        return $this->belongsTo(Transaksi::class, 'id_transaksi');
    }
}
