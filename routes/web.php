<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AjaxPostController;
use App\Http\Controllers\ProductAjaxController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\MenuItemController;
use Illuminate\Support\Facades\Auth;

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
// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');




Route::get('member', [MemberController::class, 'index'])->name('member.index');
Route::get('member-search', [MemberController::class, 'indexsearch'])->name('member.indexsearch');
Route::get('show', [MemberController::class, 'show'])->name('member.show');
Route::post('store', [MemberController::class, 'store'])->name('member.store');
Route::post('update', [MemberController::class, 'update'])->name('member.update');
Route::post('delete', [MemberController::class, 'destroy'])->name('member.destroy');
Route::post('/search', [MemberController::class, 'search'])->name('user.search');


Route::get('/teacher', [TeacherController::class, 'index'])->name('teacher.index');
Route::get('/teacher/all', [TeacherController::class, 'show'])->name('teacher.show');
Route::post('/teacher/store/', [TeacherController::class, 'store'])->name('teacher.store');
Route::get('/teacher/edit/{id}', [TeacherController::class, 'edit'])->name('teacher.edit');
Route::post('/teacher/update/{id}', [TeacherController::class, 'update'])->name('teacher.update');
Route::get('/teacher/destroy/{id}', [TeacherController::class, 'destroy'])->name('teacher.destroy');




Route::get('/menu', [MenuItemController::class, 'index'])->name('menu.index');
Route::post('/menu-items',[MenuItemController::class, 'store'])->name('menu.store');
Route::get('/menu-items/{id}/edit', [MenuItemController::class, 'edit'])->name('menu.edit');
Route::put('/menu-items/{id}/update', [MenuItemController::class, 'update'])->name('menu.update');
Route::put('//menu-items/update-order', [MenuItemController::class, 'updateOrder'])->name('menu.updateOrder');



Route::get('/ajax/index', [TeacherController::class, 'ajaxindex'])->name('ajax.index');
Route::any('/ajax/store', [TeacherController::class, 'ajaxstore'])->name('ajax.store');

