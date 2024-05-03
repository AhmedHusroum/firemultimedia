<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();


        $user = $request->user();
        if ($user->hasRole('Admin')) {
            return redirect()->route('dashboard');
        } elseif ($user->hasRole('User')) {
            return redirect()->route('user.dashboard');
        } elseif ($user->hasRole('Finance')) {
            return redirect()->route('finances.index');
        } elseif ($user->hasRole('Sales')) {
            return redirect()->route('sales.dashboard');
        } elseif ($user->hasRole('Maintenance')) {
            return redirect()->route('maintenance.index');
        } elseif ($user->hasRole('Headmaintenance')) {
            return redirect()->route('maintenance.index');
        } elseif ($user->hasRole('Inventory')) {
            return redirect()->route('purchases_products.index'); //is inkoop
        } elseif ($user->hasRole('Customer')) {
            return redirect()->route('customers.index');
        } else {
            return redirect(RouteServiceProvider::HOME);
        }

        return redirect(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
