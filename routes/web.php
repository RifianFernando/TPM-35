<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\CreateBookMiddleware;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

// cara best practicenya
Route::get('/home', [HomeController::class, 'home'])->name('rumah');

// Route::get('/jual', function () {
//     return view('page_jual_beli.jual_page');
// });

// Route::get('/beli', function () {
//     return view('page_jual_beli.beli_page');
// });

// create book //
// Page khusus get page create book
// pakein middleare agar user role customer gk bisa masuk ke page ini

Route::middleware(['auth', 'CreateBookPageMiddleware'])->group(function () {
    // GET
    // create book page
    Route::get('/create-book', [BookController::class, 'redirectToCreateBookPage']);

    // post create book
    Route::post('/post-create-book', [BookController::class, 'createBook']);

    // update //
    // kita pasing id untuk page update agar si aplikasi tau book apa yang ingin kita update
    Route::get('/update-book-page/{id}', [BookController::class, 'updateBookPage']);

    // data yang bakal di post khusus update data dari table book
    Route::post('/update-book/{id1}', [BookController::class, 'updateBook']);


    // delete
    // kita pasing id untuk delete agar si aplikasi tau book apa yang ingin kita delete dari primary key
    Route::post('/delete-book/{id}', [BookController::class, 'deleteBook']);
});

Route::post('/send-mail-user-info', [EmailController::class, 'SendMail'])->name('SendMail')->middleware('auth');
