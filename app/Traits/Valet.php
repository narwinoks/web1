<?php

namespace App\Traits;

use App\Models\DataFix;
use Illuminate\Http\JsonResponse;

trait Valet
{
    protected function success($message = "", $data = [], $statusCode = 200): JsonResponse
    {
        return response()->json(array_merge($message, $data), $statusCode);
    }

    protected function error($message = [], $statusCode = 400, $error = [], $data = []): JsonResponse
    {
        return response()->json(array_merge($message, $error, $data), $statusCode);
    }
    protected function respond($data, $statusCode): JsonResponse
    {
        return response()->json($data, $statusCode);
    }

    protected function getFix($name)
    {
        $data = DataFix::where('name', $name)->where('statusenable', true)->first();
        return $data->value;
    }
    protected function  generateUniqueOrderNumber()
    {
        $prefix = 'O-';
        $datePart = date('ymd');
        $randomPart = str_pad(mt_rand(1, 999999), 6, '0', STR_PAD_LEFT);

        return $prefix . $datePart . $randomPart;
    }
}
