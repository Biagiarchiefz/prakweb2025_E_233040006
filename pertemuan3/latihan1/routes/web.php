<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardPostController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/blog', function () {
    return view('blog');
});

Route::get('/contact', function () {
    return view('contact');
});



Route::get('/posts', [PostController::class, 'index'])->middleware('auth')->name('posts.index');

// route model binding dengan slug, kalau direact namanya dynamic routing
Route::get('/posts/{post:slug}', [PostController::class, 'show'])->middleware('auth')->name('posts.show');

// Route untuk register - middleware guest ( hanya untuk yang belum login )
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->middleware('guest')->name('register');
Route::post('/register', [RegisterController::class, 'register'])->middleware('guest')->name('register.process');

// Route untuk login - middleware guest ( hanya untuk yang belum login )
Route::get('/login', [LoginController::class, 'showLoginForm'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'login'])->middleware('guest')->name('login.process');


// Route logout - middleware auth ( hanya untuk yang sudah login )
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


Route::get('/categories', [CategoryController::class, 'index']);


// Route untuk dashboard posts - hanya untuk yang sudah login
// index - Menampilkan smua post milik user yang sedang login
Route::get('/dashboard', [DashboardPostController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard.index');

// Create - form untuk membuat post baru
Route::get('/dashboard/create', [DashboardPostController::class, 'create'])->middleware(['auth', 'verified'])->name('dashboard.create');

// Store - menyimpan post baru
Route::post('/dashboard', [DashboardPostController::class, 'store'])->middleware(['auth', 'verified'])->name('dashboard.store');

// Show - menampilkan detail post berdasarkan slug
Route::get('/dashboard/{post:slug}', [DashboardPostController::class, 'show'])->middleware(['auth', 'verified'])->name('dashboard.show');
