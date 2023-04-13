<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;

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

     Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });


    Route::group([], function(){ 
        Route::get('/',[BlogController::class, 'index'])->name('main');         
        Route::get('/blogpost/{blog}', [BlogController::class, 'view'])->name('blogs.view'); 
    });
 

    Route::middleware(['auth', 'verified'])->group(function(){
        Route::get('/blogadmin',[BlogController::class, 'adminview'])->name('blogadmin');
    
        Route::get('/blogpost',[BlogController::class, 'add'])->name('blogs.add');
        Route::post('/blogpost',[BlogController::class, 'create'])->name('blogs.create');
         
        Route::get('/blogpost/{blog}/edit', [BlogController::class, 'edit'])->name('blogs.edit');
        Route::post('/blogpost/{blog}', [BlogController::class, 'update'])->name('blogs.update');
    });
 
 



    require __DIR__.'/auth.php';
