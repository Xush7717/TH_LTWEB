<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\OrderController;

// Home routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/labs', [HomeController::class, 'labs'])->name('labs');
Route::get('/search', [HomeController::class, 'search'])->name('search');

// Category routes
Route::get('/categories/hg', [CategoryController::class, 'hg'])->name('category.hg');
Route::get('/categories/rg', [CategoryController::class, 'rg'])->name('category.rg');
Route::get('/categories/mg', [CategoryController::class, 'mg'])->name('category.mg');

// Product routes
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/category/{id}', [ProductController::class, 'filterByCategory'])->name('products.category');
Route::get('/products/{id}', [ProductController::class, 'detail'])->name('product.detail');
// Cart routes
Route::get('/add-to-cart/{id}', [CartController::class, 'addToCart'])->name('cart.add');
Route::get('/buy-now/{id}', [CartController::class, 'buyNow'])->name('cart.buyNow');
Route::patch('/update-cart', [CartController::class, 'update'])->name('cart.update');

// Authentication routes
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.post');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])
        ->name('admin.dashboard');
// Cart routes
Route::get('/cart', [CartController::class, 'index'])->name('cart.index'); // Xem giỏ hàng
Route::get('/add-to-cart/{id}', [CartController::class, 'addToCart'])->name('cart.add'); // Thêm vào giỏ
Route::patch('/update-cart', [CartController::class, 'update'])->name('cart.update'); // Sửa số lượng
Route::delete('/remove-from-cart/{id}', [CartController::class, 'remove'])->name('cart.remove'); // Xóa món

// --- THÊM ĐOẠN NÀY (Để khách bấm nút Đặt hàng) ---
Route::post('/checkout', [OrderController::class, 'checkout'])->name('checkout');
// ------------------------------------------------
// Admin routes
Route::prefix('admin')->name('admin.')->group(function () {
    // Dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // Categories
    Route::resource('categories', AdminCategoryController::class)->except(['show']);

    // Products
    Route::resource('products', AdminProductController::class)->except(['show']);

    // Orders
    Route::get('orders', [AdminOrderController::class, 'index'])->name('orders.index');
    Route::get('orders/{order}', [AdminOrderController::class, 'show'])->name('orders.show');
    Route::patch('orders/{order}/status', [AdminOrderController::class, 'updateStatus'])->name('orders.updateStatus');
    Route::delete('orders/{order}', [AdminOrderController::class, 'destroy'])->name('orders.destroy');

    // Users
    Route::get('users', [AdminUserController::class, 'index'])->name('users.index');
    Route::delete('users/{user}', [AdminUserController::class, 'destroy'])->name('users.destroy');

}); 