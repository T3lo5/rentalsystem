<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = ['user_id'];

    // Relação com o usuário
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}