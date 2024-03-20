<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\UploadedFile;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\File;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    protected  function uploadImage(UploadedFile $file, $name): string
    {
        $fileName = $name . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('assets/img'), $fileName);
        return $fileName;
    }
    protected  function deleteImg($file): void
    {
        $checkOldFile = File::exists(public_path('assets/img/' . $file));
        if ($checkOldFile) {
            File::delete(public_path('assets/img/' . $file));
        }
    }
}
