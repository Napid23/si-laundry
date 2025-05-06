<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{
    use HasFactory;

    protected $primarykey = 'id';

    protected $table = 'paket';

    protected $fillable = [
        'nama_paket',
        'harga_paket',
    ];

    public function pesanan(){
        return $this->hasMany(Pesanan::class, 'paket_id', 'id');
    }
}
