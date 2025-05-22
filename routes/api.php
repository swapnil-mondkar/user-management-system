<?php
/**
 * Copyright (c) 2025, All rights reserved.
 * Author: Swapnil Mondkar
 * Date: 2025-05-21
 * Description: api.php file for handling API routes.
 * This file contains the routes for the API versioning and includes the necessary files for each version.
 */

use Illuminate\Support\Facades\Route;

// This file is where you can define all of your API routes for your application.
Route::prefix('v1')->group(function () {
    require base_path('routes/api/v1/users.php');
    require base_path('routes/api/v1/auth.php');
    // require base_path('routes/api/v1/api.php');
});

// Future versions of the API can be added here :) ..!
// Route::prefix('v2')->group(base_path('routes/api/v2/api.php'));
