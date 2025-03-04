<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class EnsurePhoneIsVerified
{
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();

        // Skip verification for admin and outlet manager roles
        if ($user->user_type === 'admin' || $user->user_type === 'outlet_manager') {
            return $next($request);
        }

        if (!$user->is_verified && in_array($user->user_type, ['customer', 'business'])) {
            return redirect()->route('verification.show', ['user' => $user->id]);
        }

        return $next($request);
    }
}
