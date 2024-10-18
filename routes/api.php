<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;



// Page d'accueil
// Route::get('/', function () {
//     return view('home');
// })->name('home');

// Page "À propos"
Route::get('/about', [UserController::class, 'about'])->name('about');

// // Routes d'authentification
Route::controller(AuthController::class)->group(function () {
    Route::get('register', 'register')->name('register');
    Route::post('register', 'registerSave')->name('register.save');

// In your routes file (e.g., web.php or api.php)
Route::get('login', [AuthController::class, 'login'])->name('login');  // If you have a GET login view
Route::post('login', [AuthController::class, 'login'])->name('login.action');  // POST request for login action


    Route::get('logout', 'logout')->middleware('auth')->name('logout');
});


