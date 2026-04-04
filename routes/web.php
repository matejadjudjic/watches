<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::get('/about', function () { return view('pages.about');})->name('about');
Route::get('/about-me', function () {return view('pages.about-me');})->name('about-me');


Route::get('/products', [ProductsController::class, 'list'])->name('products.list');
Route::get('/products/filter', [ProductsController::class, 'filter'])->name('products.filter');
Route::get('/products/{id}/images', [ProductsController::class, 'getImages'])->name('products.images');
Route::get('/products/{id}', [ProductsController::class, 'show'])->name('products.show');


Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});


Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
    Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
    Route::post('/cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
});




Route::middleware('auth')->prefix('admin')->group(function () {
    Route::get('/products', [AdminController::class, 'products'])->name('admin.products');
    Route::get('/products', [ProductController::class, 'index'])->name('admin.products.index');
    Route::get('/products/create', [ProductController::class, 'create'])->name('admin.products.create');
    Route::post('/products', [ProductController::class, 'store'])->name('admin.products.store');
    Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('admin.products.edit');
    Route::put('/products/{id}', [ProductController::class, 'update'])->name('admin.products.update');
    Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('admin.products.destroy');


    Route::get('/users', [AdminController::class, 'users'])->name('admin.users');
    Route::get('/users', [UserController::class, 'index'])->name('admin.users.index');
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
    Route::put('/users/{id}', [UserController::class, 'update'])->name('admin.users.update');
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('admin.users.destroy');

    Route::get('/orders', [AdminController::class, 'orders'])->name('admin.orders');
    Route::get('/orders', [OrderController::class, 'index'])->name('admin.orders.index');
    Route::get('/orders/{id}/edit', [OrderController::class, 'edit'])->name('admin.orders.edit');
    Route::put('/orders/{id}', [OrderController::class, 'update'])->name('admin.orders.update');
    Route::delete('/orders/{id}', [OrderController::class, 'destroy'])->name('admin.orders.destroy');


    Route::get('/brands', [BrandController::class, 'index'])->name('admin.brands.index');
    Route::get('/brands/create', [BrandController::class, 'create'])->name('admin.brands.create');
    Route::post('/brands', [BrandController::class, 'store'])->name('admin.brands.store');
    Route::get('/brands/{id}/edit', [BrandController::class, 'edit'])->name('admin.brands.edit');
    Route::put('/brands/{id}', [BrandController::class, 'update'])->name('admin.brands.update');
    Route::delete('/brands/{id}', [BrandController::class, 'destroy'])->name('admin.brands.destroy');


    Route::get('/categories', [CategoryController::class, 'index'])->name('admin.categories.index');
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('admin.categories.create');
    Route::post('/categories', [CategoryController::class, 'store'])->name('admin.categories.store');
    Route::get('/categories/{id}/edit', [CategoryController::class, 'edit'])->name('admin.categories.edit');
    Route::put('/categories/{id}', [CategoryController::class, 'update'])->name('admin.categories.update');
    Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->name('admin.categories.destroy');


    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
});
