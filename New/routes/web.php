<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;

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
Route::get('/products/{id}', [ProductController::class, 'detail'])->name('product.detail');

// Authentication routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');
