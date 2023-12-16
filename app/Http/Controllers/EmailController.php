<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function SendMail()
    {
        Mail::to(Auth::user())->send(new SendMail);

        return back()->with('status', 'berhasil kirim email');
    }
}
