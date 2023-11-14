<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('admin/home', [HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');

// create book info
Route::get('/create', [HomeController::class, 'create'])->name('create');
Route::post('/store', [HomeController::class, 'store'])->name('store');

// create request for books
Route::get('/create-request', [HomeController::class, 'createRequest'])->name('create.request');
Route::post('/store-request', [HomeController::class, 'storeRequest'])->name('store.request');

// check request to approve
Route::get('/check-requests', [HomeController::class, 'checkRequest'])->name('check.requests');
Route::get('/check-requests/status-change/{id}', [HomeController::class, 'changeStatus'])->name('book.statusChange');

// edit book info
Route::get('/edit-info/{id}', [HomeController::class, 'editBookinfo'])->name('edit.info');
Route::post('/update-info/{id}', [HomeController::class, 'updateBookinfo'])->name('update.info');

// delete book info
Route::delete('/book-info/{id}', [HomeController::class, 'deleteBooks'])->name('book-info.destroy');