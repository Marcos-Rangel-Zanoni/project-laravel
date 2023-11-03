<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LevelController extends Controller
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function gainExperience(Request $request)
    {
        $user = auth()->user();
        $user->experiencia += $request->experiencia_gain;
        $user->save();

        if ($user->experiencia >= $this->getMaxExperienceForLevel($user->level)) {
            $this->levelUp($user);
        }

        return response()->json([
            'level' => $user->level,
            'experiencia' => $user->experiencia
        ]);
    }

    private function getMaxExperienceForLevel($level)
    {
        // Lógica para calcular a quantidade máxima de experiência necessária para subir de nível.
        // Por exemplo, você pode usar uma fórmula ou uma tabela de níveis pré-definida.
    }

    private function levelUp(User $user)
    {
        $user->level++;

        // Outras lógicas de atualização do usuário, se necessário.

        $user->save();
    }
}
