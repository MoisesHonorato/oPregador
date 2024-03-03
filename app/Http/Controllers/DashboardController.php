<?php

namespace App\Http\Controllers;

use App\Models\Esboco;
use App\Models\Sermon;
use App\Models\Suggestion;
use App\Models\User;
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
        $contUsuarios               = 0;
        $esbocoRepetidos            = 0;
        $contEsbocos                = 0;
        $contSermons                = 0;
        $contSuggestions            = 0;
        $contEsbocosNaoPregados     = 0;
        $contUsuariosSemEsbocos     = 0;
        $contUsuariosSemPregacao    = 0;
        $porcUsuariosSemEsbocos     = 0;
        $porcUsuariosSemPregacao    = 0;
        $porcEsbocos                = 0;
        $porcSermons                = 0;
        $porcEsbocosNaoPregados     = 0;
        $porcEsbocoRepetidos        = 0;


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

            $contUsuarios       = User::all()->count(); // Contar os usuarios
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
            $contUsuariosSemEsbocos = DB::table('users')
                ->whereNotExists(function ($query) {
                    $query->select(DB::raw(1))
                        ->from('esbocos')
                        ->whereRaw('esbocos.usuario_id = users.id');
                })
                ->count();
            $contUsuariosSemPregacao = DB::table('users')
                ->whereNotExists(function ($query) {
                    $query->select(DB::raw(1))
                        ->from('sermons')
                        ->whereRaw('sermons.usuario_id = users.id');
                })
                ->count();
            $esbocoRepetidos = DB::table('sermons')
                ->select('esboco_id', DB::raw('COUNT(*) as total'))
                ->groupBy('esboco_id')
                ->havingRaw('COUNT(*) > 1')->count();

            $porcEsbocos        = number_format(($contEsbocos / $esbocos) * 100, 2, ',', '.');
            $porcSermons        = number_format(($contSermons / $sermons) * 100, 2, ',', '.');
            $porcEsbocosNaoPregados = number_format(($contEsbocosNaoPregados / $esbocos) * 100, 2, ',', '.');
            $porcUsuariosSemEsbocos = number_format(($contUsuariosSemEsbocos / $contUsuarios) * 100, 2, ',', '.');
            $porcUsuariosSemPregacao = number_format(($contUsuariosSemPregacao / $contUsuarios) * 100, 2, ',', '.');
            if ($contSermons != 0) {
                $porcEsbocoRepetidos        = number_format(($esbocoRepetidos / $contSermons) * 100, 2, ',', '.');
            } else {
                $porcEsbocoRepetidos = 0;
            };

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
            if ($contSermons != 0) {
                $porcEsbocoRepetidos        = number_format(($esbocoRepetidos / $contSermons) * 100, 2, ',', '.');
            } else {
                $porcEsbocoRepetidos = 0;
            };
        endif;

        return view('dashboard/index', compact(
            'admin',
            'contUsuarios',
            'contUsuariosSemEsbocos',
            'contUsuariosSemPregacao',
            'contEsbocos',
            'contSermons',
            'contSuggestions',
            'contEsbocosNaoPregados',
            'esbocoRepetidos',
            'porcEsbocos',
            'porcSermons',
            'porcEsbocosNaoPregados',
            'porcEsbocoRepetidos',
            'porcUsuariosSemEsbocos',
            'porcUsuariosSemPregacao',
        ));
    }
}
