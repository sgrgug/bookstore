<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\MyCartController;
use App\Http\Controllers\EsewaController;
use App\Http\Controllers\Admin\AdminIndexController;

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

Route::get('/', [IndexController::class, 'index'])->name('index');


Route::get('/product/{id}', [ProductController::class, "showProduct"])->name('product');
Route::get('/search', [SearchController::class, "search"])->name('search');
Route::get('/store/{name}', [ProductController::class, "showAllProducts"])->name('store');




Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        // return view('dashboard');

        if(auth()->user()->role == 'admin'){
            return redirect()->route('admin.index');
        } else {
            return redirect()->route('index');
        }
    });
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::get('/my_cart', [MyCartController::class, 'index'])->name('my_cart');
    Route::post('/my_cart/{id}', [MyCartController::class, 'destroy'])->name('my_cart_delete');

    //add to cart
    Route::post('/product/{id}', [ProductController::class, "addToCart"])->name('add_to_cart');


    //paywith esewa
    Route::post('/esewa', [EsewaController::class, 'esewaPay'])->name('esewa');
    Route::get('/success', [EsewaController::class, 'esewaPaySuccess']);
    Route::get('/failure', [EsewaController::class, 'esewaPayFailure']);
});

Route::middleware('auth', 'isAdmin')->group(function (){
    Route::get('/admin-panel/', [AdminIndexController::class, 'index'])->name('admin.index');
    Route::get('/admin-panel/delete/{id}', [AdminIndexController::class, 'delete']);
    
    
    Route::get('/admin-panel/book', [AdminIndexController::class, 'book']);
});

require __DIR__.'/auth.php';
