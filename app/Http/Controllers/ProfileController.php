<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Recompensa;
use App\Models\User;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        // Obter o usuário autenticado
        $user = Auth::user();

        // Incrementar a experiência
        $user->experiencia += 0;

        // Verificar se a experiência atingiu o limite máximo
        if ($user->experiencia >= 100) {

            $user->level += 1;
            $user->experiencia = 0;
        }
        $request->user()->save();

        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
    public function uploadImage(Request $request)
    {

        $request->user()->image = "";

        $dirImage = "img/users/";

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $requestImage = $request->image;
            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime('now')) . "." . $extension;

            $requestImage->move(public_path($dirImage), $imageName);
            $request->user()->image = $dirImage . $imageName;
        }

        $request->user()->save();

        return Redirect::route('profile.edit');
    }
    public function experienciaUser(Request $request)
    {
        // Obter o usuário autenticado
        $user = Auth::user();

        // Incrementar a experiência
        $user->experiencia += 1;

        // Verificar se a experiência atingiu o limite máximo
        if ($user->experiencia >= 100) {
            // Aumentar o nível e redefinir a experiência para zero
            $user->level += 1;
            $user->experiencia = 0;
        }
        $request->user()->save();

        return Redirect::route('profile.edit');
    }

    public function incrementarExperiencia(Request $request)
    {
        // Obter o usuário autenticado
        $user = Auth::user();

        // Definir o valor da experiência a ser incrementada
        $valorExperiencia = 50; // Substitua pelo valor desejado

        // Definir o limite máximo de experiência
        $limiteExperiencia = 100;

        // Incrementar a experiência
        $user->experiencia += $valorExperiencia;

        // Verificar se a experiência atingiu o limite máximo
        if ($user->experiencia >= $limiteExperiencia) {
            $user->level += 1;
            $user->experiencia = 0;
        }

        $request->user()->save();

        // Redirecionar de volta para a página de edição do perfil
        return Redirect::route('profile.edit');
    }

    public function store(Request $request)
    {
        $user = auth()->user();

        $recompensa = new Recompensa();
        $recompensa->nome = $request->input('nome');
        $recompensa->tipo = $request->input('tipo');
        $recompensa->image = $request->input('image');
        $recompensa->user_id = Auth::id();
        $recompensa->save();
    }
}
