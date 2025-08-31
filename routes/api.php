<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CartProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChannelController;
use App\Http\Controllers\ClaimController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\OrderMessageController;
use App\Http\Controllers\OrderProductController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\TutorialController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\OrderController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Aquí registramos las rutas de la API y las protegemos con middleware
| según los roles: admin, seller y client.
|
*/

// Ruta para obtener el usuario autenticado
Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

// Rutas públicas (sin middleware de roles)
Route::get('/rating', [RatingController::class, 'index']);
Route::get('/tutorial', [TutorialController::class, 'index']);

// =======================
// RUTAS PARA ADMIN
// =======================
Route::middleware(['auth:sanctum', 'role:admin'])->group(function () {
    Route::get('/users', [UserController::class, 'index'])->name('api.users.index');
    Route::get('/role', [RoleController::class, 'index'])->name('api.role.index');
    Route::get('/profile', [ProfileController::class, 'index'])->name('api.profile.index');
    Route::get('/sale', [SaleController::class, 'index'])->name('api.sale.index');
    Route::get('/setting', [SettingController::class, 'index'])->name('api.setting.index');
});

// =======================
// RUTAS PARA ADMIN Y SELLER
// =======================
Route::middleware(['auth:sanctum', 'role:admin,seller'])->group(function () {
    Route::get('/product', [ProductController::class, 'index'])->name('api.product.index');
    Route::get('/category', [CategoryController::class, 'index'])->name('api.category.index');
    Route::get('/cart', [CartController::class, 'index'])->name('api.cart.index');
    Route::get('/cartproduct', [CartProductController::class, 'index'])->name('api.cartproduct.index');
    Route::get('/channel', [ChannelController::class, 'index'])->name('api.channel.index');
    Route::get('/claim', [ClaimController::class, 'index'])->name('api.claim.index');
    Route::get('/location', [LocationController::class, 'index'])->name('api.location.index');
    Route::get('/notification', [NotificationController::class, 'index'])->name('api.notification.index');
});

// =======================
// RUTAS PARA CLIENTE
// =======================
Route::middleware(['auth:sanctum', 'role:client'])->group(function () {
    Route::get('/order', [OrderController::class, 'index'])->name('api.orden.index');
    Route::get('/ordenmessage', [OrderMessageController::class, 'index'])->name('api.ordenmessage.index');
    Route::get('/ordenproduct', [OrderProductController::class, 'index'])->name('api.ordenproduct.index');
});



















