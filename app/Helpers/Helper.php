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
    public static function getContent($name)
    {
        $content = Content::where('statusenable', true)
            ->where('statusenable', true)
            ->where('category', $name)
            ->orderBy('created_at', 'DESC')
            ->first();
        if ($content) {
            $data = $content;
        } else {
            $data = [];
        }
        return $data;
    }
    public static function convertPriceToShortFormat($price): string
    {
        $abbreviations = array('k', 'M', 'B', 'T');
        $abbreviationsCount = count($abbreviations) - 1;

        for ($i = $abbreviationsCount; $i >= 0; $i--) {
            $size = pow(10, ($i + 1) * 3);
            if ($size <= abs($price)) {
                $formattedPrice = round($price / $size, 1) . $abbreviations[$i];
                break;
            }
        }

        return $formattedPrice ?? $price;
    }
    public static function generateUniqueOrderNumber(): string
    {
        $prefix = 'O-';
        $datePart = date('ymd');
        $randomPart = str_pad(mt_rand(1, 999999), 6, '0', STR_PAD_LEFT);

        return $prefix . $datePart . $randomPart;
    }
}
