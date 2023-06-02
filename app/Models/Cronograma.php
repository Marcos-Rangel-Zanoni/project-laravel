<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Cronograma extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'data', 'materia', 'horario_inicial', 'horario_final'];

    // Relacionamento com o usuário
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
