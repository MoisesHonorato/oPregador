<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use App\Models\Esboco;
use App\Models\Sermon;
use App\Models\Suggestion;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        session(['currentPage' => 'dashboard']);

        $user           = auth()->user(); // Obter o usuário logado
        $accessLevels   = $user->accessLevels;

        $admin = false;
        $pregador = false;

        // Iterar sobre os níveis de acesso
        foreach ($accessLevels as $accessLevel) {
            if ($accessLevel->name == 'admin') {
                $admin = true;
            }
            if ($accessLevel->name == 'pregador') {
                $pregador = true;
            }
            // Se ambos os papéis forem encontrados, não há necessidade de continuar o loop
            if ($admin && $pregador) {
                break;
            }
        }

        $esbocos    = Esboco::all()->count();
        $sermons    = Sermon::all()->count();

        if ($admin) :
            $contEsbocos        = Esboco::all()->count(); // Contar os esboços
            $contSermons        = Sermon::all()->count(); // Contar os sermons
            $contSuggestions    = Suggestion::all()->count(); // Contar os sugestões
            $contEsbocosNaoPregados    = DB::table('esbocos')
                ->whereNotExists(function ($query) {
                    $query->select(DB::raw(1))
                        ->from('sermons')
                        ->whereRaw('sermons.esboco_id = esbocos.id');
                })
                ->count();
            $esbocoRepetidos = DB::table('sermons')
                ->select('esboco_id', DB::raw('COUNT(*) as total'))
                ->groupBy('esboco_id')
                ->havingRaw('COUNT(*) > 1')->count();
            $porcEsbocos        = number_format(($contEsbocos / $esbocos) * 100, 2, ',', '.');
            $porcSermons        = number_format(($contSermons / $sermons) * 100, 2, ',', '.');
            $porcEsbocosNaoPregados = number_format(($contEsbocosNaoPregados / $esbocos) * 100, 2, ',', '.');
            $porcEsbocoRepetidos        = number_format(($esbocoRepetidos / $contSermons) * 100, 2, ',', '.');
        endif;

        if ($pregador) :
            $contEsbocos        = Esboco::where('usuario_id', $user->id)->count(); // Contar os esboços
            $contSermons        = Sermon::where('usuario_id', $user->id)->count(); // Contar os sermons
            $contSuggestions    = Suggestion::where('user_id', $user->id)->count(); // Contar os sugestões
            $contEsbocosNaoPregados    = DB::table('esbocos')
                ->where('usuario_id', $user->id)
                ->whereNotExists(function ($query) {
                    $query->select(DB::raw(1))
                        ->from('sermons')
                        ->whereRaw('sermons.esboco_id = esbocos.id');
                })
                ->count();
            $esbocoRepetidos = DB::table('sermons')
                ->select('esboco_id', DB::raw('COUNT(*) as total'))
                ->where('usuario_id', $user->id)
                ->groupBy('esboco_id')
                ->havingRaw('COUNT(*) > 1')->count();
            $porcEsbocos        = number_format(($contEsbocos / $esbocos) * 100, 2, ',', '.');
            $porcSermons        = number_format(($contSermons / $sermons) * 100, 2, ',', '.');
            $porcEsbocosNaoPregados = number_format(($contEsbocosNaoPregados / $esbocos) * 100, 2, ',', '.');
            $porcEsbocoRepetidos        = number_format(($esbocoRepetidos / $contSermons) * 100, 2, ',', '.');
        endif;

        return view('dashboard/index', compact(
            'contEsbocos',
            'contSermons',
            'contSuggestions',
            'contEsbocosNaoPregados',
            'esbocoRepetidos',
            'porcEsbocos',
            'porcSermons',
            'porcEsbocosNaoPregados',
            'porcEsbocoRepetidos',
        ));
    }
}
