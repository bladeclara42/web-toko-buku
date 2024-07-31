<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderItemController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\PublisherController;


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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [BookController::class, 'index'])->name('home');

Auth::routes();

Route::get('/books/create', [BookController::class, 'create'])->name ('books.create');

Route::middleware(['auth'])->group(function () {
    Route::get('/books/{book}', [BookController::class, 'show'])->name('books.show');
    Route::get('/order/{book}', [OrderItemController::class, 'create'])->name('order.create');
    Route::post('/order', [OrderItemController::class, 'store'])->name('order.store');
    Route::get('/invoice/{orderItem}', [OrderItemController::class, 'invoice'])->name('order.invoice');
});

Route::middleware(['auth', 'can:admin'])->group(function () {
    Route::get('/books/create', [BookController::class, 'create'])->name('books.create');
    Route::post('/books', [BookController::class, 'store'])->name('books.store');
    Route::get('/books/{book}/edit', [BookController::class, 'edit'])->name('books.edit');
    Route::put('/books/{book}', [BookController::class, 'update'])->name('books.update');
    Route::delete('/books/{book}', [BookController::class, 'destroy'])->name('books.destroy');
    Route::resource('authors', AuthorController::class)->except(['show']);
    Route::resource('publishers', PublisherController::class)->except(['show']);
});
