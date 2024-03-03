<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmailVerificationNotificationController extends Controller
{
    /**
     * Send a new email verification notification.
     */
    public function store(Request $request): RedirectResponse
    {
        if ($request->user()->hasVerifiedEmail()) {

            // REDIRECIONANDO O USUÁRIO CONFORME SUA PERMISSÃO
            $user = Auth::user();
            if ($user->admin) {
                return redirect()->intended(RouteServiceProvider::ADMIN);
            }
            if ($user->cliente) {
                return redirect()->intended(RouteServiceProvider::CLIENTE);
            }

            return redirect()->intended(RouteServiceProvider::HOME);
        }

        $request->user()->sendEmailVerificationNotification();

        return back()->with('status', 'verification-link-sent');
    }
}
