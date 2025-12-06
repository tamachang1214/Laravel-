<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;

#「/（トップページ）に GET でアクセスされたら welcome.blade.php を返す」
Route::get('/', function () {
    return view('welcome');
});

// 書籍一覧（BookController の index を実行）
Route::get('/book', [\App\Http\Controllers\BookController::class, 'index']);

// 編集画面のルート
Route::get('/book/edit/{id}', [\App\Http\Controllers\BookController::class, 'edit']);

// 更新処理（POST）
Route::post('/book/update/{id}', [\App\Http\Controllers\BookController::class, 'update']);

// 削除
Route::post('/book/delete/{id}', [\App\Http\Controllers\BookController::class, 'destroy']);

// 新規作成フォーム
Route::get('/book/create', [\App\Http\Controllers\BookController::class, 'create']);

// データ登録処理
Route::post('/book/store', [\App\Http\Controllers\BookController::class, 'store']);

//----------------------------------------------------------------------------
//会社一覧ページ

//会社一覧（CompanyController の index を実行）
Route::get('/company', [CompanyController::class, 'index']);

// 編集画面のルート
Route::get('/company/edit/{id}', [\App\Http\Controllers\CompanyController::class, 'edit']);

// 更新処理（POST）
Route::post('/company/update/{id}', [\App\Http\Controllers\CompanyController::class, 'update']);

// 削除
Route::post('/company/delete/{id}', [\App\Http\Controllers\CompanyController::class, 'destroy']);

// 新規作成フォーム
Route::get('/company/create', [\App\Http\Controllers\CompanyController::class, 'create']);

// データ登録処理
Route::post('/company/store', [\App\Http\Controllers\CompanyController::class, 'store']);

//----------------------------------------------------------------------------
//社員一覧ページ

//社員一覧（EmployeeController の index を実行）
Route::get('/employee', [EmployeeController::class, 'index']);

// 編集画面のルート
Route::get('/employee/edit/{id}', [\App\Http\Controllers\EmployeeController::class, 'edit']);

// 更新処理（POST）
Route::post('/employee/update/{id}', [\App\Http\Controllers\EmployeeController::class, 'update']);

// 削除
Route::post('/employee/delete/{id}', [\App\Http\Controllers\EmployeeController::class, 'destroy']);

// 新規作成フォーム
Route::get('/employee/create', [\App\Http\Controllers\EmployeeController::class, 'create']);

// データ登録処理
Route::post('/employee/store', [\App\Http\Controllers\EmployeeController::class, 'store']);