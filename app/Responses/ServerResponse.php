<?php

namespace App\Responses;

class ServerResponse
{
    public const INTERNAL_SERVER_ERROR = [
        'rc' => '500',
        'message' => 'Internal Server Error'
    ];

    public const UNAUTHORIZED = [
        'rc' => '401',
        'message' => 'Unauthenticated'
    ];

    public const FORBIDDEN = [
        'rc' => '403',
        'message' => 'You are not authorized to access this resource'
    ];

    public const NOT_FOUND = [
        'rc' => '404',
        'message' => 'messages.404'

    ];

    public const DATA_NOT_FOUND = [
        'rc' => '404',
        'message' => 'messages.404'
    ];

    public const NOT_FOUND_EX = [
        'rc' => '404',
        'message' => ' Not Found'
    ];

    public const METHOD_NOT_ALLOWED = [
        'rc' => '405',
        'message' => 'Method Not Allowed'
    ];

    public const UNPROCESSABLE_ENTITY = [
        'rc' => '422',
        'message' => 'Unprocessable Entity'
    ];

    public const TOO_MANY_REQUESTS = [
        'rc' => '429',
        'message' => 'Too Many Requests'
    ];

    public const BAD_REQUEST = [
        'rc' => '400',
        'message' => 'Bad Request'
    ];

    public const CONFLICT = [
        'rc' => '409',
        'message' => 'Data Already Exist'
    ];

    public const VALIDATION = [
        'rc' => '400',
        'message' => 'Validation Error'
    ];

    public const SUCCESS = [
        'rc' => '200',
        'message' => 'Successfully',
    ];

    public const SUCCESS_CREATE = [
        'rc' => '201',
        'message' => 'Successfully Create',
    ];
    public const SUCCESS_UPDATE = [
        'rc' => '201',
        'message' => 'Successfully Update',
    ];

    public const SUCCESS_DELETE = [
        'rc' => '201',
        'message' => 'Successfully Delete',
    ];
}
