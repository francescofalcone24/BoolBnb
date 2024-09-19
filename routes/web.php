<?php

use App\Http\Controllers\Api\VisualController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController; //<---- Import del controller precedentemente creato!
use App\Http\Controllers\SuiteController;
use App\Http\Controllers\SponsorController;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\Api\MessageController;
use App\Models\Sponsor;
use App\Models\User;
use Illuminate\Http\Request;


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

Route::middleware(['auth'])
    ->prefix('admin') //definisce il prefisso "admin/" per le rotte di questo gruppo
    ->name('admin.') //definisce il pattern con cui generare i nomi delle rotte cioè "admin.qualcosa"
    ->group(function () {

        //Siamo nel gruppo quindi:
        // - il percorso "/" diventa "admin/"
        // - il nome della rotta ->name("dashboard") diventa ->name("admin.dashboard")
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        Route::resource('suite', SuiteController::class);
        Route::resource('User', User::class);
        Route::resource('sponsor', SponsorController::class);
        Route::resource('messages', MessageController::class);
        Route::resource('visuals', VisualController::class);
        // Route::get('VisualChart', [chart])
        // Route::resource('graph', \App\Http\Controllers\VisualController::class);

        // Route::get('/paymentSponsorship', [PaymentController::class , 'pay']);
        // **********************************

        // Route::get('/payment/process', [PaymentController::class , 'process'])->name('admin.payment.process');

        //  Route::get('/payment', [PaymentController::class,'checkout']);
        //  });


        Route::get('payment/{suite_slug}/sponsor', [PaymentController::class, 'check_in'])->name('payment');
    });


require __DIR__ . '/auth.php';
