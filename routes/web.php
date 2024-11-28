<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


route::get('admin/dashboard',[HomeController::class,'index'])->middleware(['auth','admin']);

route::get('view_category',[AdminController::class,'view_category'])->middleware(['auth','admin']);

route::post('add_category',[AdminController::class,'add_category'])->middleware(['auth','admin']);

route::get('delete_category/{id}',[AdminController::class,'delete_category'])->middleware(['auth','admin']);

route::get('edit_category/{id}',[AdminController::class,'edit_category'])->middleware(['auth','admin']);

route::post('update_category/{id}',[AdminController::class,'update_category'])->middleware(['auth','admin']);

Route::get('/', [HomeController::class,'home']);
Route::get('/dashboard', [HomeController::class,'login_home'])->middleware(['auth', 'verified'])->name('dashboard');
route::get('add_cart/{id}', [HomeController::class, 'add_cart'])->middleware(['auth', 'verified']);
route::get('mycart', [HomeController::class, 'mycart'])->middleware(['auth', 'verified']);
route::get('delete_cart/{id}', [HomeController::class, 'delete_cart'])->middleware(['auth', 'verified']);
route::post('comfirm_order', [HomeController::class, 'comfirm_order'])->middleware(['auth', 'verified']);