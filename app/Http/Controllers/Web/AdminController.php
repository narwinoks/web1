<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function home(Request $request)
    {
        return view('features.admin.dashboard');
    }
    public function booking(Request $request)
    {
        return view('features.admin.booking');
    }
}
