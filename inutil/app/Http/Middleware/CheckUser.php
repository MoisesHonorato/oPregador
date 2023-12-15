<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;


class CheckUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $userId = $request->route('user'); // Supondo que o parâmetro na rota seja 'user'
        if (Auth::user()->id != $userId) {
            return redirect()->back()->with('error', 'Você não tem permissão para acessar este recurso.');
        }
        return $next($request);
    }
}
