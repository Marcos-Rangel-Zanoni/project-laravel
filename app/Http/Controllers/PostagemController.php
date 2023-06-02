<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Postagem;
use Illuminate\Http\Request;
use App\Models\User;

class PostagemController extends Controller
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function index()
    {
        $postagens = Postagem::all();
        $user = $this->user->find(Auth::id());
        $allUsers = User::all();
        return view('site.postagem.index', compact('postagens', 'user', 'allUsers'));
    }

    public function pullAdd()
    {
        $postagems = Postagem::all();
        return response()->json($postagems);
    }

    public function create()
    {

        return view('site.postagem.create');
    }

    public function store(Request $request)
    {
        // Valide os dados recebidos do formulário

        $request->validate([
            'texto' => 'required',
            'imagem' => 'image|mimes:jpeg,png,jpg|max:2048', // Valide a imagem (opcional)
        ]);

        // Crie uma nova instância do modelo de postagem e defina os valores
        $user = Auth::user();
        $postagem = new Postagem();
        $postagem->texto = $request->texto;

        // Associar a postagem ao usuário autenticado
        $postagem->user_id = Auth::id();

        // Salve a imagem (se fornecida)
        if ($request->hasFile('imagem')) {
            $imagem = $request->file('imagem');
            $caminhoImagem = $imagem->store('imagens', 'public');
            $postagem->imagem = $caminhoImagem;
        }

        // Salve a postagem no banco de dados
        $postagem->save();

        return response()->json($postagem);
    }

    public function increase()
    {
        $user = $this->user->find(Auth::id());
        $user->level++;
        $user->save();

        return redirect()->route('postagem.index');
    }
    public function buscarUsuarios()
    {
        $usuarios = User::all(); // Ou qualquer lógica de busca que você precise

        return response()->json([
            'success' => true,
            'usuarios' => $usuarios
        ]);
    }
}
