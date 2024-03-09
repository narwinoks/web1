<?php

namespace App\Traits;

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
}
