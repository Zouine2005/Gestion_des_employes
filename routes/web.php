<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ConfigurationController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\DepartementController;
use App\Http\Controllers\ProfileController;
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
Route::get('/lougout',[AuthController::class, 'logout'])->name('logout');

//Route securise
Route::middleware('auth')->group(function(){
    Route::get('dashboard',[AppController::class, 'show'])->name('dashboard');

    Route::prefix('employers')->group(function () {
        Route::get("/", [EmployerController::class, 'index'])->name('employer.index');
        Route::get('/create', [EmployerController::class, 'create'])->name('employer.create');
        Route::post('/store', [EmployerController::class, 'store'])->name('employer.store');
        Route::get('/edit/{employer}', [EmployerController::class, 'edit'])->name('employer.edit');
        Route::put('/update/{employer}', [EmployerController::class, 'update'])->name('employer.update'); // Pour la mise à jour
        Route::delete('/delete/{employer}', [EmployerController::class, 'destroy'])->name('employer.destroy'); // Pour la suppression
    });
    
        Route::prefix('departement')->group(function() {
            Route::get('/', [DepartementController::class, 'index'])->name('departement.index');
            Route::get('/create', [DepartementController::class, 'create'])->name('departement.create');
            Route::post('/create', [DepartementController::class, 'store'])->name('departement.store');
            Route::get('/edit/{departement}', [DepartementController::class, 'edit'])->name('departement.edit');
            Route::put('/update/{departement}', [DepartementController::class, 'update'])->name('departement.update');
            Route::get('/{departement}',[DepartementController::class, 'delete'])->name('departement.delete');

            });
        Route::prefix('configurations')->group(function () {
                Route::get('/', [ConfigurationController::class, 'index'])->name('configurations.index');
                Route::get('/create', [ConfigurationController::class, 'create'])->name('configurations.create');
                Route::post('/store', [ConfigurationController::class, 'store'])->name('configurations.store');
                Route::get('/edit/{id}', [ConfigurationController::class, 'edit'])->name('configuration.edit');
                Route::put('/{id}', [ConfigurationController::class, 'update'])->name('configuration.update');
                Route::delete('/{id}', [ConfigurationController::class, 'destroy'])->name('configuration.delete');
            });
        
        Route::prefix('profiles')->group(function(){
            Route::get('/',[ProfileController::class,'index'])->name('profile.index');
            Route::get('/edit/{id}', [ProfileController::class, 'edit'])->name('profile.edit');
            Route::put('/{id}', [ProfileController::class, 'update'])->name('profile.update');
        });



    
    

});

