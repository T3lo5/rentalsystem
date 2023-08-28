<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $fillable = ['name'];

    // Relação com os veículos
    public function veiculos()
    {
        return $this->hasMany(Veiculo::class);
    }
}