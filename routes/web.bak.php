<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Cms\NewsController as CmsNewsController;
use App\Http\Controllers\Cms\CategoriesController as CmsCategoriesController;
use App\Http\Controllers\Cms\TagsController as CmsTagsController;
use App\Http\Controllers\Cms\UsersController as CmsUsersController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('layouts.default');
});

// Admin
Route::resource('/admin/news', CmsNewsController::class);
Route::resource('/admin/categories', CmsCategoriesController::class, ['except' => ['show']]);
Route::resource('/admin/tags', CmsTagsController::class, ['except' => ['show']]);
Route::resource('/admin/users', CmsUsersController::class, ['except' => ['show']]);
