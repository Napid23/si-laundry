<?php

namespace App\Models;

use App\Models\User;
use App\Models\Paket;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pesanan extends Model
{
    use HasFactory;

    protected $primarykey = 'id';

    protected $table = 'pesanan';

    protected $fillable = [
        'no_invoice',
        'creator_id',
        'pelanggan_id',
        'paket_id',
        'berat',
        'total_harga',
        'tanggal_pesanan',
        'tanggal_proses',
        'tanggal_selesai',
        'tanggal_diterima',
        'status',
        
    ];

    public function pelanggan(){
        return $this->belongsTo(User::class, 'pelanggan_id', 'id');
    }
    public function creator(){
        return $this->belongsTo(User::class, 'creator_id', 'id');
    }
    public function paket(){
        return $this->belongsTo(Paket::class, 'paket_id', 'id');
    }
}
