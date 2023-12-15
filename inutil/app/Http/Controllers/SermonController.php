<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sermon;
use App\Models\Esboco;
use Illuminate\Support\Facades\Auth;

class SermonController extends Controller
{

    public function index(Request $request)
    {
        session(['currentPage' => 'sermons']);

        $search = request('search');

        $esbocos = Esboco::where('usuario_id', Auth::user()->id)->get();

        $user = Auth::user();

        $query = Sermon::with('esboco', 'usuario')
            ->where('usuario_id', $user->id);

        if ($request->has('search')) {
            $searchTerm = '%' . $request->input('search') . '%';
            $query->where(function ($q) use ($searchTerm) {
                $q->where('local_sermon', 'like', $searchTerm)
                    ->orWhere('observacao', 'like', $searchTerm);
            });
        }

        $sermons = $query->paginate(5);

        return view('sermons.index', compact('sermons', 'esbocos', 'search'));
    }

    public function create()
    {
        $esbocos = Esboco::where('usuario_id', Auth::user()->id)->get();

        return view('sermons.create', compact('esbocos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'esboco_id' => 'required',
            'local_sermon' => 'required|string|max:255',
            'data_sermon' => 'required|date',
            'imagens.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $usuarioId = Auth::id(); // Obtém o ID do usuário autenticado

        $sermon = new Sermon();
        $sermon->esboco_id = $request->input('esboco_id');
        $sermon->usuario_id = $usuarioId;
        $sermon->local_sermon = $request->input('local_sermon');
        $sermon->data_sermon = $request->input('data_sermon');
        $sermon->observacao = $request->input('observacao');

        $sermon->save();

        return redirect()->route('sermons.index')->with('success', 'Pregação criada com sucesso!');
    }

    public function show(Sermon $sermon)
    {

        // Verificar se o esboço pertence ao usuário logado
        if ($sermon->usuario_id != Auth::user()->id) {
            return redirect()->route('sermons.index')
                ->with('error', 'Você não tem permissão para visualizar esta pregação.');
        }

        return view('sermons.show', compact('sermon'));
    }

    public function share(Sermon $sermon)
    {
        return view('sermons.share', compact('sermon'));
    }

    public function edit(string $id)
    {

        $sermon = Sermon::findOrFail($id);

        // Verificar se o sermão pertence ao usuário logado
        if ($sermon->usuario_id != Auth::user()->id) {
            return redirect()->route('sermons.index')
                ->with('error', 'Você não tem permissão para editar este sermão.');
        }

        $esbocos = Esboco::where('usuario_id', Auth::user()->id)->get();
        return view('sermons.edit', compact('sermon', 'esbocos'));
    }

    public function update(Request $request, string $id)
    {
        $sermon = Sermon::findOrFail($id);

        // Verificar se a pregação pertence ao usuário logado
        if ($sermon->usuario_id != Auth::user()->id) {
            return redirect()->route('sermons.index')
                ->with('error', 'Você não tem permissão para editar esta pregação.');
        }

        $request->validate([
            'esboco_id' => 'required',
            'local_sermon' => 'required|string|max:255',
            'data_sermon' => 'required|date',
            'observacao' => 'nullable|string'
        ]);

        $sermon->esboco_id = $request->input('esboco_id');
        $sermon->local_sermon = $request->input('local_sermon');
        $sermon->data_sermon = $request->input('data_sermon');
        $sermon->observacao = $request->input('observacao');

        $sermon->save();

        return redirect()->route('sermons.index')->with('success', 'Pregação atualizada com sucesso!');
    }

    public function destroy(string $id)
    {
        //
    }
}
