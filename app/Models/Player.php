<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'level', 'experience'];

    public function completeMission($experienceEarned)
    {
        $this->experience += $experienceEarned;

        $levelUpExperience = 100; // Quantidade de experiência necessária para subir de nível

        if ($this->experience >= $levelUpExperience) {
            $this->level++;
            $this->experience -= $levelUpExperience;
            $this->save();

            return "Parabéns, você subiu para o nível " . $this->level . "!";
        } else {
            $this->save();

            return "Missão completa! Você ganhou " . $experienceEarned . " pontos de experiência.";
        }
    }
}
