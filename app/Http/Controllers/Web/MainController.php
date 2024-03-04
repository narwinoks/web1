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

    public function studio(Request $request)
    {
        return view('features.public.studio');
    }
    public function wedding(Request $request)
    {
        return view('features.public.wedding');
    }
    public function prewedding(Request $request)
    {
        return view('features.public.prewedding');
    }
    public function engagement(Request $request)
    {
        return view('features.public.engagement');
    }
    public function pengajian(Request $request)
    {
        return view('features.public.pengajian');
    }
    public function kin(Request $request)
    {
        return view('features.public.kin');
    }
    public function pl(Request $request)
    {
        return view('features.public.pl');
    }
}
