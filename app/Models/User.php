<?php

namespace App\Models;

use App\Models\Pesanan;
use App\Models\Pelanggan;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'level',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'level' => 'string',
    ];

    public function pesanan(){
        return $this->hasMany(Pesanan::class, 'pelanggan_id', 'id');
    }

    public function creator(){
        return $this->hasMany(Pesanan::class, 'creator_id', 'id');
    }

    public function pelanggan(){
        return $this->hasOne(Pelanggan::class, 'user_id', 'id');
    }
}
