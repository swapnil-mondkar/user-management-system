<?php
/**
 * Copyright (c) 2025, All rights reserved.
 * Author: Swapnil Mondkar
 * Date: 2025-05-21
 * Description: users.php file for handling user-related API routes.
 * This file contains the routes for user-related operations such as creating, updating, and deleting users.
 */

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\V1\UserController;

// This is apiResource route for the UserController.
// It will automatically create routes for index, show, store, update, and destroy methods.
Route::apiResource('users', UserController::class);
