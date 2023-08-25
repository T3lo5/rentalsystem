<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = ['user_id', 'vehicle_id'];

    // Relacionamento com o modelo User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relacionamento com o modelo Vehicle
    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }
}
