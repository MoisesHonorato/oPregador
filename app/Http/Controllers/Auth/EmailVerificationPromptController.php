<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class EmailVerificationPromptController extends Controller
{
    /**
     * Display the email verification prompt.
     */
    public function __invoke(Request $request): RedirectResponse|View
    {
        // return $request->user()->hasVerifiedEmail()
        //     ?  redirect()->intended(RouteServiceProvider::HOME)
        //     : view('auth.verify-email');

        // REDIRECIONANDO O USUÁRIO CONFORME SUA PERMISSÃO
        $user = Auth::user();
        if ($request->user()->hasVerifiedEmail() and $user->admin) {
            return redirect()->intended(RouteServiceProvider::ADMIN);
        }
        if ($request->user()->hasVerifiedEmail() and $user->cliente) {
            return redirect()->intended(RouteServiceProvider::CLIENTE);
        }

        return view('auth.verify-email');
    }
}
