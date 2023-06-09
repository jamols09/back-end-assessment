<?php

use App\Http\Controllers\EmailTemplateController;
use App\Http\Controllers\SendMailController;
use App\Http\Controllers\SentMailController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    // Route::get('/render', function () {
    //     return Inertia::render('Dashboard');
    // })->name('dashboard');

    Route::get('/template', [EmailTemplateController::class, 'create'])->name('template.create');
    Route::post('/template', [EmailTemplateController::class, 'store'])->name('template.store');
    Route::get('/template/list', [EmailTemplateController::class, 'index'])->name('template.index');
    Route::delete('/template/{template}', [EmailTemplateController::class, 'destroy'])->name('template.destroy');
    Route::get('/template/{template}', [EmailTemplateController::class, 'show'])->name('template.show');
    Route::put('/template/{template}', [EmailTemplateController::class, 'update'])->name('template.update');

    Route::get('/mail/{template}', [SendMailController::class, 'show'])->name('mail.show');
    Route::post('/mail/{template}', [SendMailController::class, 'store'])->name('mail.store');

    Route::get('/sent/list', [SentMailController::class, 'index'])->name('sent.index');
    Route::get('/sent/{sent}', [SentMailController::class, 'show'])->name('sent.show');
});
