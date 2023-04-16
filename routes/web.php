<?php

use App\Http\Controllers\EmailTemplate;
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

    Route::get('/template', [EmailTemplate::class, 'create'])->name('template.create');
    Route::post('/template', [EmailTemplate::class, 'store'])->name('template.store');
    Route::get('/template/list', [EmailTemplate::class, 'index'])->name('template.index');
    Route::delete('/template/{template}', [EmailTemplate::class, 'destroy'])->name('template.destroy');
    Route::get('/template/{template}', [EmailTemplate::class, 'show'])->name('template.show');;
    Route::put('/template/{template}', [EmailTemplate::class, 'update'])->name('template.update');;
});
