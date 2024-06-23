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

Route::prefix('imoveis')->group(function(){
    Route::get('/',[ImoveisController::class,'index'])->name('imoveis-index');
    Route::post('/',[ImoveisController::class,'store'])->name('imoveis-store');
    
    Route::get('/{id}/edit',[ImoveisController::class,'edit'])-> where('id','[0-9]+')->name('imoveis-edit');
    Route::put('/{id}',[ImoveisController::class,'update'])-> where('id','[0-9]+')->name('imoveis-update');
    //Route::delete('/{id}',[LivrosControler::class,'destroy'])-> where('id','[0-9]+')->name('livros-destroy');
});



// Route::prefix('livros')->group(function(){
//     Route::get('/',[LivrosControler::class,'index'])->name('livros-index');
//     Route::get('/create',[LivrosControler::class,'create'])->name('livros-create');    
//     Route::post('/',[LivrosControler::class,'store'])->name('livros-store');
//     Route::get('/{id}/edit',[LivrosControler::class,'edit'])-> where('id','[0-9]+')->name('livros-edit');
//     Route::put('/{id}',[LivrosControler::class,'update'])-> where('id','[0-9]+')->name('livros-update');
//     Route::delete('/{id}',[LivrosControler::class,'destroy'])-> where('id','[0-9]+')->name('livros-destroy');
//  });
Route::fallback(function(){
    return 'url nao encontrada verifique!';
});
