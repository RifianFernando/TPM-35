<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function home()
    {
        $a = "halo ini message dari backend dari controller.php";
        $list_book = Book::all();
        // $a = 0;
        return view('home', [
            "message" => $a,
            "list_book" => $list_book
        ]);
    }
}
