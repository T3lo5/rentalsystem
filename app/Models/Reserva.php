<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    protected $fillable = ['user_id', 'vehicle_id'];

    // Relação com o usuário
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relação com o veículo
    public function veiculo()
    {
        return $this->belongsTo(Veiculo::class, 'vehicle_id');
    }
}