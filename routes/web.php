<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('backend.pages.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::middleware(['auth','verified'])->group(function(){
   Route::get('user-logout',[UserController::class, 'logout'])->name('user.logout');


   //roles route
   Route::get('/roles', [RoleController::class, 'index'])->name('roles.index');
   Route::get('/roles/create', [RoleController::class, 'create'])->name('roles.create');
   Route::post('/store', [RoleController::class, 'store'])->name('roles.store');
   Route::get('/roles/edit/{id}', [RoleController::class, 'edit'])->name('roles.edit');
   Route::put('/update/{id}', [RoleController::class, 'update'])->name('roles.update');
   Route::delete('/roles/delete/{id}', [RoleController::class, 'destroy'])->name('roles.delete');
   //user routes
   Route::get('/users', [UserController::class, 'index'])->name('users.index');
   Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
   Route::post('/users', [UserController::class, 'store'])->name('users.store');
   Route::get('/users/edit/{id}',[UserController::class,'edit'])->name('users.edit');
   Route::put('/users/{id}',[UserController::class,'update'])->name('users.update');
   Route::delete('/users/{id}',[UserController::class,'destroy'])->name('users.destroy');


});

