<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\OperatorController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('contacts.create');
    })->name('dashboard');
    Route::resource('operator', OperatorController::class);
    Route::resource('contact', ContactController::class);
    Route::post('/import', [ContactController::class, 'import'])->name('import');
    Route::resource('message', MessageController::class)->only('index', 'create', 'store');
    Route::get('remap', [ContactController::class, 'remap'])->name('remap');
});
