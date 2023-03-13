<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AjaxPostController;
use App\Http\Controllers\ProductAjaxController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\TeacherController;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/ajax-post', [AjaxPostController::class, 'create'])->name('ajax.post.create');
Route::get('ajax-post/store', [AjaxPostController::class, 'store'])->name('ajax.post.store');

Route::resource('products-ajax-crud', ProductAjaxController::class);


Route::resource('ajaxposts', PostController::class);


Route::get('member', [MemberController::class, 'index'])->name('member.index');
Route::get('show', [MemberController::class, 'show'])->name('member.show');
Route::post('store', [MemberController::class, 'store'])->name('member.store');
Route::post('update', [MemberController::class, 'update'])->name('member.update');
Route::post('delete', [MemberController::class, 'destroy'])->name('member.destroy');


Route::get('/teacher', [TeacherController::class, 'index'])->name('teacher.index');
Route::get('/teacher/all', [TeacherController::class, 'show'])->name('teacher.show');
Route::post('/teacher/store/', [TeacherController::class, 'store'])->name('teacher.store');
Route::get('/teacher/edit/{id}', [TeacherController::class, 'edit'])->name('teacher.edit');
Route::post('/teacher/update/{id}', [TeacherController::class, 'update'])->name('teacher.update');
Route::get('/teacher/destroy/{id}', [TeacherController::class, 'destroy'])->name('teacher.destroy');



