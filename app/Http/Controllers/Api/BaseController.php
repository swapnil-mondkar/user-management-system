<?php
/**
 * Copyright (c) 2025, All rights reserved.
 * Author: Swapnil Mondkar
 * Date: 2025-05-21
 * Description: BaseController class for handling API responses.
 * This class contains methods for returning success and error responses in JSON format.
 */

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

class BaseController extends Controller
{
    protected function errorResponse(string $message, int $status = 404)
    {
        return response()->json(['error' => $message], $status);
    }
}

