<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

// Layout
Route::get('/navbar', function () {
    return view('component.layout.navbar');
})->name('navbar');

Route::get('/footer', function () {
    return view('component.layout.footer');
})->name('footer');

// ------ Component ------

// Component - Gallery
Route::get('/gallery', function () {
    return view('component.gallery.gallery');
})->name('gallery');

Route::get('/review_gallery', function () {
    return view('component.gallery.review_gallery');
})->name('review_gallery');

Route::get('/artists_profile', function () {
    return view('component.gallery.artists_profile');
})->name('artists_profile');

// Component - Artists
Route::get('/artists', function () {
    return view('component.artists.artists');
})->name('artists');

Route::get('/profile_art', function () {
    return view('component.artists.profile_art');
})->name('profile_art');


// ----- Admin -----
Route::get('/form_login', function () {
    return view('admin.form_login');
})->name('form_login');