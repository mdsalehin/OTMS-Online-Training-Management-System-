<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\OTMSController;

Route::get('/', [OTMSController::class, 'home'])->name('home');

Route::get('/category',[OTMSController::class, 'category'])->name('category-products');
Route::get('/details',[OTMSController::class, 'details'])->name('course-details');

Route::get('/blog-category',[OTMSController::class,'blogCategory'])->name('blog-category');
Route::get('/blog',[OTMSController::class,'blog'])->name('blog');

Route::get('/contact', [OTMSController::class, 'contact'])->name('contact');
Route::get('/about', [OTMSController::class, 'about'])->name('about');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

});
