<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BookController;

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

// cara not best practice but like uggly man
// Route::get('/home', function () {
//     $a = "halo ini message dari backend dari route.php seharusnya ini di passing dari controller kenapa harus aku??";
//     // $a = 0;
//     return view('home', [
//         "message" => $a
//     ]);
// });

// cara best practicenya
Route::get('/home', [HomeController::class, 'home']);

// Route::get('/jual', function () {
//     return view('page_jual_beli.jual_page');
// });

// Route::get('/beli', function () {
//     return view('page_jual_beli.beli_page');
// });

// Page khusus get page create book
Route::get('/create-book', [BookController::class, 'redirectToCreateBookPage']);

// page khusus post data create book
Route::post('/post-create-book', [BookController::class, 'createBook']);
