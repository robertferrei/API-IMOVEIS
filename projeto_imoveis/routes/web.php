<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImoveisController;
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

Route::prefix('corretor')->group(function () {
    Route::get('/', [ImoveisController::class, 'index'])->name('imoveis-index');
    Route::post('/', [ImoveisController::class, 'store'])->name('imoveis-store');

    Route::get('/{id}/edit', [ImoveisController::class, 'edit'])->where('id', '[0-9]+')->name('imoveis-edit');
    Route::put('/{id}', [ImoveisController::class, 'update'])->where('id', '[0-9]+')->name('imoveis-update');
    Route::delete('/{id}', [ImoveisController::class, 'destroy'])->where('id', '[0-9]+')->name('imoveis-destroy');
});
Route::fallback(function () {
    return 'url nao encontrada verifique!';
});
