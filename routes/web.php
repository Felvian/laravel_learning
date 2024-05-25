<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/', [\App\Http\Controllers\MainController::class,'index'])->name('main.index');

Route::group(['namespace' => 'App\Http\Controllers\Post'], function () {
    Route::get('/posts', 'IndexController')->name('post.index');
    Route::get('/posts/create', 'CreateController')->name('post.create')->middleware('create');
    Route::post('posts', 'StoreController')->name('post.store');
    Route::get('posts/{post}', 'ShowController')->name('post.show');
    Route::get('posts/{post}/edit', 'EditController')->name('post.edit');
    Route::patch('posts/{post}', 'UpdateController')->name('post.update');
    Route::delete('posts/{post}', 'DestroyController')->name('post.delete')->middleware('destroy');
});
/*----------------------------------------------------------------------------------------------------------
Route::get('/posts', [\App\Http\Controllers\Post\IndexController::class])->name('post.index');
Route::get('/posts/create', [\App\Http\Controllers\Post\CreateController::class])->name('post.create');
Route::post('posts', [\App\Http\Controllers\Post\StoreController::class])->name('post.store');
Route::get('posts/{post}', [\App\Http\Controllers\Post\ShowController::class])->name('post.show');
Route::get('posts/{post}/edit', [\App\Http\Controllers\Post\EditController::class])->name('post.edit');
Route::patch('posts/{post}', [\App\Http\Controllers\Post\UpdateController::class])->name('post.update');
Route::delete('posts/{post}', [\App\Http\Controllers\Post\DestroyController::class])->name('post.delete');
----------------------------------------------------------------------------------------------------------*/

Route::group(['namespace' => 'App\Http\Controllers\Admin','prefix'=>'admin', 'middleware' => 'admin'], function () {
    Route::group(['namespace' => 'Post'], function () {
        Route::get('/post', 'IndexController')->name('admin.post.index');
        Route::get('/post/create', 'CreateController')->name('admin.post.create');
        Route::post('posts', 'StoreController')->name('admin.post.store');
        Route::get('posts/{post}', 'ShowController')->name('admin.post.show');
        Route::get('posts/{post}/edit', 'EditController')->name('admin.post.edit');
        Route::patch('posts/{post}', 'UpdateController')->name('admin.post.update');
        Route::delete('posts/{post}', 'DestroyController')->name('admin.post.delete');
    });

});


Route::get('/main', [\App\Http\Controllers\MainController::class,'index'])->name('main.index');

Route::get('/contacts', [\App\Http\Controllers\ContactsController::class,'index'])->name('contact.index');
Route::get('/about', [\App\Http\Controllers\AboutController::class,'index'])->name('about.index');





Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
