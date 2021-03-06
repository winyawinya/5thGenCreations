<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\VerificationController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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
Route::get('products', [MenuController::class,'MenuPage'])->where('menu', "[A-z_\-]+")->name('products-data');
Route::get('font', [MenuController::class, 'fonts']);


//CART

Route::group(['middleware' => ['auth' , 'verified']], function() {
    Route::get('cart', [CartController::class,'showCart']);
    Route::post('cart-remove', [CartController::class,'remove'])->name('remove');
    Route::post('cart-add', [CartController::class,'addToCart'])->name('cartAdd');
    Route::get('checkout', [CartController::class, 'checkout'])->name('checkout');
});

Route::prefix('home-function')->group(function(){
    Route::post('{id}', [CartController::class, 'showFunctions'])->name('home-functions');
});



//LOGIN AND REGISTER

Route::get ('register', [AccountController::class, 'showRegister'])->middleware('guest');
Route::post('register', [AccountController::class, 'register'])->middleware('guest');
Route::get('login', [AccountController::class, 'showLogin'])->middleware('guest')->name('login');
Route::post('login', [AccountController::class, 'login'])->middleware('guest');
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
Route::get('viewregister',[AdminController::class, 'viewregister'])->middleware('admin');
Route::get('pending-orders',[AdminController::class, 'pendingOrders'])->middleware('admin');
Route::post('pending-orders',[AdminController::class, 'deleteOrder'])->middleware('admin');
Route::get('completed-orders',[AdminController::class, 'completedOrders'])->middleware('admin');
Route::post('completed-orders',[AdminController::class, 'orderCompleter'])->middleware('admin');
Route::get('order-details-{id}',[AdminController::class, 'orderDetails'])->middleware('admin')->name('orderDetails');
Route::get('adminaddproduct',[AdminController::class, 'adminaddproduct'])->middleware('admin');

//FAVORITES
Route::post('favorites', [MenuController::class,'changeFave'])->middleware('auth');
Route::get('favorites', [MenuController::class,'favorites'])->middleware('auth');

//CHECKOUT
Route::get('checkout',[MenuController::class, 'checkout'])->middleware('auth');

//THANKYOU
Route::get('thankyou',[MenuController::class, 'thankyou'])->middleware('auth')->name('thankyou');

//TRACKORDER
Route::get('trackorder', [MenuController::class,'trackorder'])->middleware('auth');

//ORDERCONFIRMATION
Route::get('orderconfirmed',[MenuController::class, 'orderconfirmed'])->middleware('auth');

//EMAIL
Route::group(['middleware' => ['auth']], function() {
    Route::get('/print-order', [CartController::class,'print_orders'])->name('print-order');
    Route::get('/email/verify', [VerificationController::class, 'show'])->name('verification.notice');
    Route::get('/email/verify/{id}/{hash}', [VerificationController::class, 'verify'])->name('verification.verify')->middleware(['signed']);
    Route::post('/email/resend', [VerificationController::class, 'resend'])->name('verification.resend');
});