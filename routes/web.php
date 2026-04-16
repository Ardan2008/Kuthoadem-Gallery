<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

// --- PUBLIC ROUTES (Akses Tanpa Login) ---
Route::get('/', function () { return view('home'); })->name('home');
Route::get('/navbar', function () { return view('component.layout.navbar'); })->name('navbar');
Route::get('/footer', function () { return view('component.layout.footer'); })->name('footer');

// Component Gallery & Artists
Route::get('/gallery', function () { return view('component.gallery.gallery'); })->name('gallery');
Route::get('/review_gallery', function () { return view('component.gallery.review_gallery'); })->name('review_gallery');
Route::get('/artists_profile', function () { return view('component.gallery.artists_profile'); })->name('artists_profile');
Route::get('/artists', function () { return view('component.artists.artists'); })->name('artists');
Route::get('/profile_art', function () { return view('component.artists.profile_art'); })->name('profile_art');

// Login Page
// Mengambil kode unik dari .env, jika tidak ada defaultnya adalah 'login'
$adminPath = env('ADMIN_URL', 'login');

Route::get('/' . $adminPath, function () { 
    return view('admin.form_login'); 
})->name('login'); // Beri nama 'login' agar redirect otomatis bekerja
Route::post('/api/login', [AuthController::class, 'login']);

// --- PROTECTED ROUTES (Hanya Bisa Diakses Setelah Login) ---
Route::middleware(['auth'])->group(function () {
    
    // Dashboard & Sidebar
    Route::get('/master', function () { return view('admin.dashboard.master'); })->name('master');
    Route::get('/sidebar', function () { return view('admin.dashboard.layouts.sidebar'); })->name('sidebar');

    // Main Features
    Route::get('/transactions', function () { return view('admin.dashboard.main.transactions'); })->name('transactions');
    Route::get('/collectors', function () { return view('admin.dashboard.features.collectors'); })->name('collectors');
    Route::get('/submit_artworks', function () { return view('admin.dashboard.features.submit_artworks'); })->name('submit_artworks');

    // Tools & Editing
    Route::get('/trending', function () { return view('admin.dashboard.tools.trending'); })->name('trending');
    Route::get('/edit_product', function () { return view('admin.dashboard.edit.edit_product'); })->name('edit_product');
    Route::get('/add_product', function () { return view('admin.dashboard.create.add_product'); })->name('add_product');

    // API Actions
    Route::post('/api/update-password', [AuthController::class, 'updatePassword']);
    Route::post('/api/logout', [AuthController::class, 'logout']);
});