<?php

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\User\UserController;

Route::get('/', function () {
    return view('welcome');
});


//admin routes
Route::middleware(['auth', 'verified', 'role_check:admin'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::controller(AdminController::class)->group(function () {
            Route::get('/dashboard', 'index')->name('admin.dashboard');
            Route::get('/settings', 'showSettings')->name('show.settings');
            Route::put('/update/settings', 'updateSettings')->name('settings.update');
            Route::get('/manage/users', 'manage_user')->name('admin.manage.user');
            Route::get('/order/history', 'order_history')->name('admin.order.history');

            Route::get('/users', 'showUsers')->name('show.users');


        });

        // Category Routes
        Route::controller(CategoryController::class)->group(function () {
            Route::get('/category', 'index')->name('category.index');
            Route::get('/category/create', 'create')->name('category.create');
            Route::get('/category/manage', 'manage')->name('category.manage');
            Route::post('/category','store')->name('category.store');  
            Route::get('/category/{category}/edit', 'edit')->name('category.edit');  
            Route::put('/category/{category}', 'update')->name('category.update');  
            Route::delete('/category/{category}', 'destroy')->name('category.delete');  
        });

        Route::controller(ProductController::class)->group(function () {
            Route::get('/product', 'index')->name('product.index');  
            Route::get('/product/create', 'create')->name('product.create');  
            Route::post('/product', 'store')->name('product.store');  
            Route::get('/product/{product}/edit', 'edit')->name('product.edit');  
            Route::put('/product/{product}', 'update')->name('product.update');  
            Route::delete('/product/{product}', 'destroy')->name('product.destroy');  
        });
    });
});



//admin routes
Route::middleware(['auth', 'verified', 'role_check:user'])->group(function () {
    Route::controller(UserController::class)->group(function () {
        Route::get('/dashboard', 'index')->name('dashboard');
    });
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
require __DIR__ . '/auth.php';
