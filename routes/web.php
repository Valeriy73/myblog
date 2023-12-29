<?php

use App\Http\Controllers\admin\AdminCategoryController;
use App\Http\Controllers\admin\AdminPostController;
use App\Http\Controllers\admin\AdminTagController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [MainController::class, 'index'])->name('main');
Route::group(['prefix' => 'posts'], function ()
{
    Route::get('/{post}', [MainController::class, 'single'])->name('single');
});


Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('/', [AdminPostController::class, 'index'])->name('admin.post.index');
    Route::get('/create', [AdminPostController::class, 'create'])->name('admin.post.create');
    Route::post('/', [AdminPostController::class, 'store'])->name('admin.post.store');
    Route::get('/{id}/edit', [AdminPostController::class, 'edit'])->name('admin.post.edit');
    Route::patch('/{post}', [AdminPostController::class, 'update'])->name('admin.post.update');
    Route::delete('/{post}', [AdminPostController::class, 'delete'])->name('admin.post.delete');

    Route::group(['prefix' => 'category'], function () {
        Route::get('/', [AdminCategoryController::class, 'index'])->name('admin.category.index');
        Route::get('/create', [AdminCategoryController::class, 'create'])->name('admin.category.create');
        Route::post('/', [AdminCategoryController::class, 'store'])->name('admin.category.store');
        Route::get('/{id}/edit', [AdminCategoryController::class, 'edit'])->name('admin.category.edit');
        Route::patch('/{category}', [AdminCategoryController::class, 'update'])->name('admin.category.update');
        Route::delete('/{category}', [AdminCategoryController::class, 'delete'])->name('admin.category.delete');
    });
    Route::group(['prefix' => 'tag'], function () {
        Route::get('/', [AdminTagController::class, 'index'])->name('admin.tag.index');
        Route::get('/create', [AdminTagController::class, 'create'])->name('admin.tag.create');
        Route::post('/', [AdminTagController::class, 'store'])->name('admin.tag.store');
        Route::get('/{id}/edit', [AdminTagController::class, 'edit'])->name('admin.tag.edit');
        Route::patch('/{tag}', [AdminTagController::class, 'update'])->name('admin.tag.update');
        Route::delete('/{tag}', [AdminTagController::class, 'delete'])->name('admin.tag.delete');
    });
});

Auth::routes();


