<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $fillable = [
        'name', 'email', 'password', 'phone', 'address', 'role'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    // Relação com as reservas
    public function reservas()
    {
        return $this->hasMany(Reserva::class);
    }
}