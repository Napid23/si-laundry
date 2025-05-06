<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pelanggan extends Model
{
    use HasFactory;

    protected $primarykey = 'id';

    protected $table = 'pelanggan';

    protected $fillable = [
        'user_id',
        'alamat',
        'no_hp',
    ];

    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
