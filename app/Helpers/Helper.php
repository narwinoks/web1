<?php

namespace App\Helpers;

use App\Models\Image;
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
    public static function getImageTitle($slug): string
    {
        $result  = Image::where('slug', $slug)->first();
        return $result->name ?? "Gallery";
    }
}
