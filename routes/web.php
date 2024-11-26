<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\DepartementController;
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
Route::get('/login',[AuthController::class, 'login'])->name('login');
Route::post('/login',[AuthController::class, 'handleLogin'])->name('handlelogin');

//Route securise
Route::middleware('auth')->group(function(){
    Route::get('dashboard',[AppController::class, 'show'])->name('dashboard');

    Route::prefix('employers')->group (function () {
        Route::get("/", [EmployerController::class, 'index'])->name('employer.index');
        Route::get('/create', [EmployerController::class, 'create'])->name ('employer.create');
        Route::get('/edit/{employer}', [EmployerController::class, 'edit'])->name('employer.edit');
        });
    
        Route::prefix('departement')->group(function() {
            Route::get('/', [DepartementController::class, 'index'])->name('departement.index');
            Route::get('/create', [DepartementController::class, 'create'])->name('departement.create');
            Route::post('/create', [DepartementController::class, 'store'])->name('departement.store');
            Route::get('/edit/{departement}', [DepartementController::class, 'edit'])->name('departement.edit');
            });

});

