<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $fillable = ['category_id'];

    // Relacionamento com o modelo Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Relacionamento com o modelo Reservation
    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
}
