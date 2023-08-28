<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Veiculo extends Model
{
    protected $fillable = [
        'category_id', 'name', 'description', 'price'
    ];

    // Relação com a categoria
    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'category_id');
    }

    // Relação com as reservas
    public function reservas()
    {
        return $this->hasMany(Reserva::class);
    }
}