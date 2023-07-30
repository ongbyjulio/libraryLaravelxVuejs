<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('/dashboard', [App\Http\Controllers\AdminController::class, 'dashboard']);

//Catalogs Route
// Route::get('/catalogs', [App\Http\Controllers\CatalogController::class, 'index']);
// Route::get('/catalogs/create', [App\Http\Controllers\CatalogController::class, 'create']);
// Route::post('/catalogs', [App\Http\Controllers\CatalogController::class, 'store']);
// Route::get('/catalogs/{catalog}/edit', [App\Http\Controllers\CatalogController::class, 'edit']);
// Route::put('/catalogs/{catalog}', [App\Http\Controllers\CatalogController::class, 'update']);
// Route::delete('/catalogs/{catalog}', [App\Http\Controllers\CatalogController::class, 'destroy']);

//untuk memperseingkat route diatas, dengan catatan aturan harus sama dengan standarisasi laravel/ dengan cara diatas,
Route::resource('/catalogs', App\Http\Controllers\CatalogController::class);
//End Catalogs

//Authors
Route::resource('/authors', App\Http\Controllers\AuthorController::class);
Route::get('/api/authors', [App\Http\Controllers\AuthorController::class, 'api']);
//End Authors


//Members
Route::resource('/members', App\Http\Controllers\MemberController::class);
Route::get('/api/members', [App\Http\Controllers\MemberController::class, 'api']);
//End Members

//Publishers
Route::resource('/publishers', App\Http\Controllers\PublisherController::class);
Route::get('/api/publishers', [App\Http\Controllers\PublisherController::class, 'api']);
//End Publishers

//Books
Route::resource('/books', App\Http\Controllers\BookController::class);
Route::get('/api/books', [App\Http\Controllers\BookController::class, 'api']);
Route::get('/api/books/test_spatie', [App\Http\Controllers\BookController::class, 'test_spatie']);
//End Books

//Transaction
Route::resource('/transactions', App\Http\Controllers\TransactionController::class);
Route::get('/api/transactions', [App\Http\Controllers\TransactionController::class, 'api']);
Route::get('/api/transactions/{id}/delete', [App\Http\Controllers\TransactionController::class, 'deleteTransaction']);

//endtransaction

Route::resource('/transaction_details', App\Http\Controllers\TransactionDetailController::class);
Route::get('/api/transaction_details', [App\Http\Controllers\TransactionDetailController::class, 'api']);
Route::get('/api/transaction_details/{transactionDetail}', [App\Http\Controllers\TransactionDetailController::class, 'show']);

Route::resource('/users', App\Http\Controllers\UserController::class);