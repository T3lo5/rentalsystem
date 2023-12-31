<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name'];

    // Relacionamento com o modelo Vehicle
    public function vehicles()
    {
        return $this->hasMany(Vehicle::class);
    }
}
