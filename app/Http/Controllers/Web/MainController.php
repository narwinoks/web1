<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(Request $request)
    {
        return view('features.public.index');
    }
    public function blog(Request $request)
    {
        return view('features.public.blog');
    }
}
