<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    public function Arabic()
    {
        Session::get('language');
        Session::forget('language');
        Session::put('language','arabic');
        return redirect()->back();
    }
    public function English()
    {
        Session::get('language');
        Session::forget('language');
        Session::put('language','english');
        return redirect()->back();
    }
}
