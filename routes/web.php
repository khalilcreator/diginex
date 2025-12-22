<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\FrontController::class, 'index'])->name('welcome');
Route::get('/services', [App\Http\Controllers\FrontController::class, 'services'])->name('front_services');
Route::get('/about', [App\Http\Controllers\FrontController::class, 'about'])->name('front_about');
Route::get('/contact', [App\Http\Controllers\FrontController::class, 'contact'])->name('front_contact');
Route::post('/contact', [App\Http\Controllers\FrontController::class, 'contactStore'])->name('front_contact.store');
Route::get('/blogs', [App\Http\Controllers\FrontController::class, 'blogIndex'])->name('front_blog');
Route::get('/blog/{slug}', [App\Http\Controllers\FrontController::class, 'blogShow'])->name('front_blog.show');
Route::get('/privacy', function () { return view('front.privacy'); })->name('front_privacy');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile.index');
    Route::put('/profile', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
    Route::post('/favorite/toggle', [App\Http\Controllers\FavoriteController::class, 'toggle'])->name('favorite.toggle');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::get('/', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.dashboard');
    Route::resource('category', App\Http\Controllers\Admin\CategoryController::class, ['as' => 'admin']);
    Route::resource('service', App\Http\Controllers\Admin\ServiceController::class, ['as' => 'admin']);
    Route::resource('contact', App\Http\Controllers\Admin\ContactController::class, ['as' => 'admin'])->only(['index', 'destroy']);
    Route::get('settings', [App\Http\Controllers\Admin\SettingController::class, 'index'])->name('admin.setting.index');
    Route::put('settings', [App\Http\Controllers\Admin\SettingController::class, 'update'])->name('admin.setting.update');
    Route::resource('blog', App\Http\Controllers\Admin\BlogController::class, ['as' => 'admin']);
    Route::get('users', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('admin.users.index');
    Route::delete('users/{user}', [App\Http\Controllers\Admin\UserController::class, 'destroy'])->name('admin.users.destroy');
    Route::post('users/{user}/block', [App\Http\Controllers\Admin\UserController::class, 'toggleBlock'])->name('admin.users.block');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
