<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function redirectToCreateBookPage()
    {
        return view('create_book');
    }

    public function createBook(Request $request)
    {
        // dd($request->author);
        Book::create([
            'book_name' => $request->book_name_input,
            'author' => $request->author_input,
            // 'updated_at' => now()
        ]);

        return redirect('/home');
        // coding how to insert in to database php myadmmin
    }
}
