<?php
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
// Authentication Routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Registration Routes
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Verification Routes
Route::get('/verify/{user}', [RegisterController::class, 'showVerificationForm'])->name('verification.show');
Route::post('/verify', [RegisterController::class, 'verify'])->name('verification.verify');
Route::post('/verify/resend', [RegisterController::class, 'resendCode'])->name('verification.resend');

// Dashboard Routes
Route::get('/dashboard', [DashboardController::class, 'redirectToDashboard'])->name('dashboard');
Route::get('/customer/dashboard', [DashboardController::class, 'customerDashboard'])->middleware('verified')->name('customer.dashboard');
Route::get('/business/dashboard', [DashboardController::class, 'businessDashboard'])->middleware('verified')->name('business.dashboard');
Route::get('/outlet/dashboard', [DashboardController::class, 'outletDashboard'])->name('outlet.dashboard');
Route::get('/admin/dashboard', [DashboardController::class, 'adminDashboard'])->name('admin.dashboard');

// Order routes
Route::middleware(['auth'])->group(function () {
    Route::get('/orders/create', [OrderController::class, 'create'])->name('orders.create');
    Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');
    Route::get('/orders/{id}/confirmation', [OrderController::class, 'confirmation'])->name('orders.confirmation');
    Route::get('/orders/{id}/track', [OrderController::class, 'track'])->name('orders.track');
});
