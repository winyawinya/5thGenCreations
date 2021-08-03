<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\AdminController;
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

//HOMEPAGE AND MENUPAGE

Route::get('/', [MenuController::class,'HomePage'])->where('menu', "[A-z_\-]+");
Route::get('products', [MenuController::class,'MenuPage'])->where('menu', "[A-z_\-]+");
Route::get('font', [MenuController::class, 'fonts']);


//CART


Route::get('cart', [CartController::class,'showCart']);
Route::post ('cart-remove', [CartController::class,'remove'])->name('remove');
Route::post ('cart-add', [CartController::class,'addToCart'])->name('cartAdd');


//LOGIN AND REGISTER

Route::get ('register', [AccountController::class, 'showRegister'])->middleware('guest');
Route::post('register', [AccountController::class, 'register'])->middleware('guest');
Route::get ('login', [AccountController::class, 'showLogin'])->middleware('guest')->name('login');
Route::post ('login', [AccountController::class, 'login'])->middleware('guest');
Route::get('logout',[AccountController::class, 'logout'])->middleware('auth');
Route::get('profile',[AccountController::class, 'showProfile'])->middleware('auth');
Route::get('edit-profile',[AccountController::class, 'editProfile'])->middleware('auth');
Route::post('profile',[AccountController::class, 'changedProfile'])->middleware('auth');


//DASHBOARD
Route::get('admin',[AdminController::class, 'adminPanel'])->middleware('admin');
Route::get('admin-all-products',[AdminController::class, 'adminAllProducts'])->middleware('admin');
Route::get('admin-out-products',[AdminController::class, 'adminOutProducts'])->middleware('admin');
Route::get('admin-edit-products',[AdminController::class, 'adminEditProducts'])->middleware('admin');
Route::post('post-edit-products',[AdminController::class, 'submitEditProducts'])->middleware('admin')->name('afterEdit');