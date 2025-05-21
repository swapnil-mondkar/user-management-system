<?php
/**
 * Copyright (c) 2025, All rights reserved.
 * Author: Swapnil Mondkar
 * Date: 2025-05-21
 * Description: UserController class for handling user-related API requests.
 * This class contains methods for listing, creating, updating, and deleting users.
 */

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Api\BaseController;
use App\Http\Requests\V1\UserStoreRequest;
use App\Http\Requests\V1\UserUpdateRequest;
use App\Http\Resources\V1\UserResource;

class UserController extends BaseController
{
    protected $service;

    public function __construct(\App\Services\V1\UserService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = $this->service->getAllUsers();
        return UserResource::collection($users);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserStoreRequest $request)
    {
        $user = $this->service->createUser($request->validated());
        return new UserResource($user);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = $this->service->getUserById($id);
        if (!$user) {
            return $this->errorResponse('User not found');
        }
        return new UserResource($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserUpdateRequest $request, string $id)
    {
        $user = $this->service->updateUser($id, $request->validated());
        if (!$user) {
            return $this->errorResponse('User not found or update failed');
        }
        return new UserResource($user);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $deleted = $this->service->deleteUser($id);
        if (!$deleted) {
            return $this->errorResponse('User not found or delete failed');
        }
        return response()->json(null, 204);
    }
}
