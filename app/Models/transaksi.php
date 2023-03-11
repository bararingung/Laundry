<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Alfa6661\AutoNumber\AutoNumberTrait;

class transaksi extends Model
{
    use HasFactory, AutoNumberTrait;
    protected $table = 'transaksis';
    protected $guarded = [];

    public function outlet(){
        return $this->belongsTo(Outlet::class, 'id_outlet');
    }

    public function member(){
        return $this->belongsTo(member::class, 'id_member');
    }

    public function packets(){
        return $this->belongsTo(packet::class, 'id_packets');
    }

    public function GetTotalHarga(){
        return $this->packets->harga * $this->qty;
    }
    public function TotalHargaLaporan(){
        $total = $this->jumlah_harga;
        $count = count($total);

        return $count;
    }

    
    
    /**
     * Return the autonumber configuration array for this model.
     *
     * @return array
     */
    public function getAutoNumberOptions()
    {
        return [
            'code' => [
                'format' => 'INV.?', // Format kode yang akan digunakan.
                'length' => 5 // Jumlah digit yang akan digunakan sebagai nomor urut
            ]
        ];
    }
}
