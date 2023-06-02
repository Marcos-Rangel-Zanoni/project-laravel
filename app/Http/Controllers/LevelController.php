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

    public function show()
    {
        $user = Auth::user();
        return view('site.level.show', compact('user'));
    }

    public function increase()
    {
        $user = $this->user->find(Auth::id());
        $user->level++;
        $user->save();

        return redirect()->route('level.show');
    }
}
