<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use App\Models\Esboco;
use App\Models\Sermon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        session(['currentPage' => 'dashboard']);
        
        $user = auth()->user(); // Obter o usuário logado
        $esbocos = Esboco::all()->count();
        $sermons = Sermon::all()->count();

        $contEsbocos    = Esboco::where('usuario_id', $user->id)->count(); // Contar os esboços
        $contSermons    = Sermon::where('usuario_id', $user->id)->count(); // Contar os sermons
        $porcEsbocos    = number_format(($contEsbocos / $esbocos) * 100, 2, ',', '.');
        $porcSermons    = number_format(($contSermons / $sermons) * 100, 2, ',', '.');

        return view('dashboard/index', compact(
            'contEsbocos',
            'contSermons',
            'porcEsbocos',
            'porcSermons',
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
