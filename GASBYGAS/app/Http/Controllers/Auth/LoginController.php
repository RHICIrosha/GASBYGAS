<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        $credentials = $this->credentials($request);

        if (Auth::attempt($credentials, $request->filled('remember'))) {
            $request->session()->regenerate();

            return $this->authenticated($request, Auth::user());
        }

        throw ValidationException::withMessages([
            'email' => [trans('auth.failed')],
        ]);
    }

    protected function credentials(Request $request)
    {
        $login = $request->input('email');

        if(filter_var($login, FILTER_VALIDATE_EMAIL)) {
            return ['email' => $login, 'password' => $request->input('password')];
        } else {
            return ['phone' => $login, 'password' => $request->input('password')];
        }
    }

    protected function authenticated(Request $request, $user)
        {
            if ($user->needsVerification()) {
                Auth::logout();
                return redirect()->route('verification.show', ['user' => $user->id])
                    ->with('message', 'Please verify your phone number before logging in.');
            }

            if ($user->isAdmin()) {
                return redirect()->route('admin.dashboard');
            } elseif ($user->isOutletManager()) {
                return redirect()->route('outlet.dashboard');
            } elseif ($user->isBusinessCustomer()) {
                return redirect()->route('business.dashboard');
            } else {
                return redirect()->route('customer.dashboard');
            }
        }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
