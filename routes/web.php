<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\TypeController;
use App\Http\Controllers\User\UserController;

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
    return view('index');
})->name('index');

Route::get('/inscription', [UserController::class, 'show'])->name('new');
Route::post('/inscription', [UserController::class, 'signup']);
Route::get('/connexion', [UserController::class, 'login'])->name('signin');
Route::post('/connexion', [UserController::class, 'doLogin']);
Route::get('/membre',[UserController::class,'showMembre'])->name('membre');
Route::get('/recensement',[UserController::class,'addUser'])->name('recensement');
Route::post('/recensement',[UserController::class,'insertUser'])->name('recensement_store');
Route::get('/modifmember/{utilisateur}',[UserController::class,'modifMem'])->name('modifmembre');
Route::post('/modifmember/{utilisateur}',[UserController::class,'validModif'])->name('modif_store');
Route::get('/logout',[UserController::class,'logout'])->name('logout');
Route::prefix('admin')->name('admin.')->group(function(){

    Route::resource('typemembre',TypeController::class)->except('show');
    Route::get('/logout',[TypeController::class,'logout'])->name('logout');
});

