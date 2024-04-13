<?php

namespace App\Http\Controllers;

use App\Models\Suggestion;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SuggestionController extends Controller
{
    public function index(Request $request)
    {
        session(['currentPage' => 'suggestions']);

        $user = Auth::user();
        $search = request('search');

        $query = Suggestion::where('user_id', $user->id);

        if ($request->has('search')) {
            $searchTerm = '%' . $request->input('search') . '%';
            $query->where(function ($q) use ($searchTerm) {
                $q->where('title', 'like', $searchTerm)
                    ->orWhere('subject', 'like', $searchTerm);
            });
        }

        $suggestions = $query->paginate(5);

        return view('suggestions.index', compact('suggestions', 'search'));
    }

    public function indexAdmin(Request $request)
    {
        session(['currentPage' => 'suggestions']);

        $user = Auth::user();
        $search = request('search');

        $query = Suggestion::query();

        if ($request->has('search')) {
            $searchTerm = '%' . $request->input('search') . '%';
            $query->where(function ($q) use ($searchTerm) {
                $q->where('title', 'like', $searchTerm)
                    ->orWhere('subject', 'like', $searchTerm);
            });
        }

        $suggestions = $query->paginate(5);

        return view('suggestions.indexAdmin', compact('suggestions', 'search'));
    }

    public function create()
    {
        return view('suggestions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'subject' => 'required',
        ]);

        Suggestion::create([
            'user_id' => Auth::user()->id,
            'title' => $request->input('title'),
            'subject' => $request->input('subject'),
        ]);

        return redirect()->route('suggestions.index')->with('success', 'Muito obrigado pela sua sugestão!');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $user = Auth::user();
        $suggestion = Suggestion::find($id);

        // Valida se o usuário logado realmente pode editar a sugestão
        if ($suggestion->user_id != $user->id) :
            return redirect()->route('suggestions.index');
        endif;

        return view('suggestions.edit', compact('suggestion'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required',
            'subject' => 'required',
        ]);

        $suggestion = Suggestion::find($id);

        $suggestion->title = $request->title;
        $suggestion->subject = $request->subject;

        $suggestion->save();

        return redirect()->route('suggestions.index')->with('success', 'Sua sugestão foi alterada com sucesso!');
    }

    public function destroy(string $id)
    {
        //
    }
}
