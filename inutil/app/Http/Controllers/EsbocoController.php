<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Esboco;
use App\Models\Categoria;
use App\Models\Livro;
use Illuminate\Support\Facades\Auth;

class EsbocoController extends Controller
{
    public function index(Request $request)
    {
        session(['currentPage' => 'esbocos']);

        $user = Auth::user();
        $search = request('search');

        $query = Esboco::with('categoria')
            ->where('usuario_id', $user->id);

        if ($request->has('search')) {
            $searchTerm = '%' . $request->input('search') . '%';
            $query->where('titulo', 'like', $searchTerm);
        }

        $esbocos = $query->paginate(5);

        return view('esbocos/index', ['esbocos' => $esbocos, 'search' => $search]);
    }

    public function create()
    {
        $categorias = Categoria::all();
        $livros = Livro::all();

        return view('esbocos.create', ['categorias' => $categorias], ['livros' => $livros]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'categoria_id' => 'required',
            'titulo' => 'required',
            'capitulo' => 'required',
            'versiculo' => 'required',
            'texto' => 'required',
        ]);

        $usuarioId = Auth::id(); // Obtém o ID do usuário autenticado

        $esboco = new Esboco();
        $esboco->usuario_id = $usuarioId;
        $esboco->categoria_id = $request->input('categoria_id');
        $esboco->livro_id = $request->input('livro_id');
        $esboco->titulo = $request->input('titulo');
        $esboco->capitulo = $request->input('capitulo');
        $esboco->versiculo = $request->input('versiculo');
        $esboco->texto = $request->input('texto');

        $esboco->save();

        return redirect()->route('esbocos.index')->with('success', 'Esboço criado com sucesso!');
    }

    public function show(Esboco $esboco)
    {
        // Verificar se o esboço pertence ao usuário logado
        if ($esboco->usuario_id != Auth::user()->id) {
            return redirect()->route('esbocos.index')
                ->with('error', 'Você não tem permissão para visualizar este esboço.');
        }

        return view('esbocos.show', ['esboco' => $esboco]);
    }

    public function edit(Esboco $esboco)
    {
        // Verificar se o esboço pertence ao usuário logado
        if ($esboco->usuario_id != Auth::user()->id) {
            return redirect()->route('esbocos.index')
                ->with('error', 'Você não tem permissão para editar este esboço.');
        }

        $categorias = Categoria::all();
        $livros = Livro::all();

        return view('esbocos.edit', compact('esboco', 'categorias', 'livros'));
    }

    public function update(Request $request, Esboco $esboco)
    {
        // Verificar se o esboço pertence ao usuário logado
        if ($esboco->usuario_id != Auth::user()->id) {
            return redirect()->route('esbocos.index')
                ->with('error', 'Você não tem permissão para editar este esboço.');
        }

        $request->validate([
            'categoria_id' => 'required',
            'livro_id' => 'required',
            'titulo' => 'required',
            'capitulo' => 'required',
            'versiculo' => 'required',
            'texto' => 'required',
        ]);

        $esboco->update([
            'categoria_id' => $request->input('categoria_id'),
            'livro_id' => $request->input('livro_id'),
            'titulo' => $request->input('titulo'),
            'capitulo' => $request->input('capitulo'),
            'versiculo' => $request->input('versiculo'),
            'texto' => $request->input('texto'),
        ]);

        return redirect()->route('esbocos.index')->with('success', 'Esboço atualizado com sucesso!');
    }

    public function destroy(string $id)
    {
        //
    }
}
