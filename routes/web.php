<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\BookController;

/*
|--------------------------------------------------------------------------
| 認証必須
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', function () {
        return redirect('/company');
    })->middleware(['auth'])->name('dashboard');

    // トップページ（ログイン後）
    Route::get('/', function () {
        return redirect('/company');
    });

    // --------------------------------------------------
    // Book
    Route::get('/book', [BookController::class, 'index']);
    Route::get('/book/create', [BookController::class, 'create']);
    Route::post('/book/store', [BookController::class, 'store']);
    Route::get('/book/edit/{id}', [BookController::class, 'edit']);
    Route::post('/book/update/{id}', [BookController::class, 'update']);
    Route::post('/book/delete/{id}', [BookController::class, 'destroy']);

    // --------------------------------------------------
    // Company
    Route::get('/company', [CompanyController::class, 'index']);
    Route::get('/company/create', [CompanyController::class, 'create']);
    Route::post('/company/store', [CompanyController::class, 'store']);
    Route::get('/company/edit/{id}', [CompanyController::class, 'edit']);
    Route::post('/company/update/{id}', [CompanyController::class, 'update']);
    Route::post('/company/delete/{id}', [CompanyController::class, 'destroy']);

    // 社員（会社別）
    Route::get('/company/{company_id}/employees', [EmployeeController::class, 'indexByCompany']);

    // --------------------------------------------------
    // Employee
    Route::get('/employee', [EmployeeController::class, 'index']);
    Route::get('/employee/create', [EmployeeController::class, 'create']);
    Route::post('/employee/store', [EmployeeController::class, 'store']);
    Route::get('/employee/edit/{id}', [EmployeeController::class, 'edit']);
    Route::post('/employee/update/{id}', [EmployeeController::class, 'update']);
    Route::post('/employee/delete/{id}', [EmployeeController::class, 'destroy']);

});
