<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified')->except(['index', 'redirectToDashboard']);
    }

    /**
     * Redirect users to appropriate dashboard based on role
     */
    public function redirectToDashboard()
    {
        $user = Auth::user();

        // Check user_type directly instead of using helper methods
        if ($user->user_type === 'admin') {
            return redirect()->route('admin.dashboard');
        } elseif ($user->user_type === 'outlet_manager') {
            return redirect()->route('outlet.dashboard');
        } elseif ($user->user_type === 'business') {
            if (!$user->is_verified) {
                return redirect()->route('verification.show', ['user' => $user->id]);
            }
            return redirect()->route('business.dashboard');
        } else {
            if (!$user->is_verified) {
                return redirect()->route('verification.show', ['user' => $user->id]);
            }
            return redirect()->route('customer.dashboard');
        }
    }

    /**
     * Display customer dashboard
     */
    public function customerDashboard()
    {
        return view('customer.dashboard');
    }

    /**
     * Display business customer dashboard
     */
    public function businessDashboard()
    {
        return view('business.dashboard');
    }

    /**
     * Display outlet manager dashboard
     */
    public function outletDashboard()
    {
        return view('outlet.dashboard');
    }

    /**
     * Display admin dashboard
     */
    public function adminDashboard()
    {
        return view('admin.dashboard');
    }
}
