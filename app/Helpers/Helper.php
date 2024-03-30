<?php

namespace App\Helpers;

use App\Models\Content;
use App\Models\Image;
use App\Models\Profile;
use App\Models\User;

class Helper
{
    public static function jumlahUser()
    {
        return User::whereNotNull('email')->count();
    }
    public static function getProfile($key): string
    {
        $profile = request()->session()->has('profile') ? json_decode(request()->session()->get('profile'), true) : null;
        $result = isset($profile[$key]) ?  $profile[$key]  : "";
        return  $result;
    }
    public static function profile($key): string
    {
        $profile = Profile::first()->toArray();
        $result = isset($profile[$key]) ?  $profile[$key]  : "";
        return  $result;
    }
    public static function getImageTitle($slug): string
    {
        $result  = Image::where('slug', $slug)->first();
        return $result->name ?? "Gallery";
    }
    public static function getBanner($name): string
    {
        $banner = Content::where('statusenable', true)
            ->where('statusenable', true)
            ->where('category', $name)
            ->orderBy('created_at', 'DESC')
            ->first();
        $img = "";
        if ($banner) {
            $data = json_decode($banner->content, true);
            $img = isset($data['file']) ? $data['file'] : '600x400.png';
        } else {
            $img = "600x400.png";
        }
        return $img;
    }
}
