<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\Dashboard\DashboardController;

use App\Http\Controllers\Admin\CourseModule\CourseCategoryController;
use App\Http\Controllers\Admin\courseModule\CourseController;

use App\Http\Controllers\Admin\UserModule\UserController;
use App\Http\Controllers\Admin\BlogModule\BlogCategoryController;

use App\Http\Controllers\Admin\BlogModule\BlogController;

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard',[DashboardController::class,'dashboard'])->name('dashboard');

    Route::prefix('admin')->group(function (){
        Route::resource('course-categories',CourseCategoryController::class);
        Route::resource('courses',CourseController::class);
        Route::resource('users',UserController::class);

        Route::resource('blog-categories',BlogCategoryController::class);
        Route::resource('blogs',BlogController::class);

    });
});
