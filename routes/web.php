<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController; //user
use App\Http\Controllers\BarangController; //barang
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\AdminSubscriptionReportController;

Route::get('/', function () {
    return redirect('/dashboard');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::resource('users', UserController::class); //user
Route::resource('barangs', BarangController::class); //barang

Route::middleware('auth')->group(function () {


Route::get('/plans', [SubscriptionController::class, 'plans'])
    ->name('subscriptions.plans');

Route::post('/checkout/{plan}', [SubscriptionController::class, 'checkout'])
    ->name('subscriptions.checkout');

Route::get('/payment/{subscription}', [SubscriptionController::class, 'payment'])
    ->name('subscriptions.payment');

Route::post('/payment/{subscription}/pay', [SubscriptionController::class, 'pay'])
    ->name('subscriptions.pay');

Route::get('/my-subscriptions', [SubscriptionController::class, 'my'])
    ->name('subscriptions.my');

Route::get('/subscription-status', [SubscriptionController::class, 'status'])
    ->name('subscriptions.status');

Route::get('/premium-content', [SubscriptionController::class, 'premiumContent'])
    ->name('subscriptions.premium-content');

Route::get('/admin/subscription-report', [AdminSubscriptionReportController::class, 'index'])
    ->name('admin.subscription-report');


});


require __DIR__.'/auth.php';
