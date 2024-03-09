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
    public function review(Request $request)
    {
        return view('features.public.review');
    }
    public function faq(Request $request)
    {
        return view('features.public.faq');
    }
    public function aboutUs(Request $request)
    {
        return view('features.public.about-us');
    }
    public function gallery(Request $request)
    {
        $title = "Gallery Title";
        return view('features.public.gallery', compact('title'));
    }
    public function form(Request $request)
    {
        return view('features.public.form');
    }
    public function login(Request $request)
    {
        return view('features.public.login');
    }
    public function register(Request $request)
    {
        return view('features.public.register');
    }
}
