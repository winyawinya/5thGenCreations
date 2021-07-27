<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\MenuController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//FOR DEBUGGING
Route::get('dd', [CartController::class,'dd'])->name('dd');

//HOMEPAGE AND MENUPAGE

Route::get('/', [MenuController::class,'HomePage'])->where('menu', "[A-z_\-]+");

Route::get('products', [MenuController::class,'MenuPage'])->where('menu', "[A-z_\-]+");

//CART

Route::get('cart', [CartController::class,'showCart']);

Route::post ('cart-remove', [CartController::class,'remove'])->name('remove');

Route::post ('cart-add', [CartController::class,'addToCart'])->name('cartAdd');


//LOGIN AND REGISTER

Route::get ('register', [AccountController::class, 'showRegister'])->middleware('guest');
Route::post('register', [AccountController::class, 'register'])->middleware('guest');
Route::get ('login', [AccountController::class, 'showLogin'])->middleware('guest');
Route::post ('login', [AccountController::class, 'login'])->middleware('guest');
Route::post('logout',[AccountController::class, 'logout'])->middleware('auth');
Route::get('profile',[AccountController::class, 'showProfile'])->middleware('auth');
Route::get('edit-profile',[AccountController::class, 'editProfile'])->middleware('auth');
Route::post('profile',[AccountController::class, 'changedProfile'])->middleware('auth');