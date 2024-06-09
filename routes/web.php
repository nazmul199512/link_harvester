<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UrlController;


// Route for displaying the form to add URLs
Route::get('/add-urls', [UrlController::class, 'add'])->name('urls.add');

// Route for storing submitted URLs
Route::post('/store-urls', [UrlController::class, 'store'])->name('urls.store');

// Route for showing URLs with search, sort, and pagination
Route::get('/', [UrlController::class, 'index'])->name('urls.index');
