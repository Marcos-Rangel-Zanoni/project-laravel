<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Cronograma;

class HomeController extends Controller
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    // public function index()
    // {
    //     return view('site.home');
    // }
    public function show()
    {
        
        $user = Auth::user();
        
        return view('site.home', compact('user'));
    }

    public function increase()
    {
        $user = $this->user->find(Auth::id());
        $user->level++;
        $user->save();

        return redirect()->route('site.home');
    }
}
