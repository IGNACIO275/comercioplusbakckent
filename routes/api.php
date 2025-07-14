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
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/users', [UserController::class, 'index'])->name('api.users.index');

Route::get('/cart', [CartController::class, 'index'])->name('api.cart.index');

Route::get('/cartprodcut', [CartProductController::class, 'index'])->name('api.cartprodcut.index');

Route::get('/category', [CategoryController::class, 'index'])->name('api.category.index');

Route::get('/channel', [ChannelController::class, 'index'])->name('api.channel.index');

Route::get('/claim', [ClaimController::class, 'index'])->name('api.claim.index');

Route::get('/location', [LocationController::class, 'index'])->name('api.location.index');

Route::get('/notification', [NotificationController::class, 'index'])->name('api.notification.index');

Route::get('/order', [NotificationController::class, 'index'])->name('api.order.index');

Route::get('/ordenmessage', [OrderMessageController::class, 'index'])->name('api.ordenmessage.index');

Route::get('/ordenproduct', [OrderProductController::class, 'index'])->name('api.ordenproduct.index');

Route::get('/product', [ProductController::class, 'index'])->name('api.product.index');

Route::get('/profile', [ProfileController::class, 'index'])->name('api.profile.index');

Route::get('/role', [RoleController::class, 'index'])->name('api.role.index');

Route::get('/sale', [SaleController::class, 'index'])->name('api.sale.index');

Route::get('/setting', [SettingController::class, 'index'])->name('api.setting.index');

Route::get('/tutorial', [TutorialController::class, 'index'])->name('api.tutorial.index');



















