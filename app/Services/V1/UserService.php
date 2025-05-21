<?php
/**
 * Copyright (c) 2025, All rights reserved.
 * Author: Swapnil Mondkar
 * Date: 2025-05-21
 * Description: UserService class for handling user-related operations.
 * This class contains business logic for user management.
 */

namespace App\Services\V1;

use App\Repositories\V1\UserRepository;

class UserService
{
    protected $repo;

    public function __construct(UserRepository $repo)
    {
        $this->repo = $repo;
    }

    public function getAllUsers()
    {
        return $this->repo->all();
    }

    public function getUserById($id)
    {
        return $this->repo->find($id);
    }

    public function createUser(array $data)
    {
        $data['password'] = bcrypt($data['password']);
        return $this->repo->create($data);
    }

    public function updateUser($id, array $data)
    {
        return $this->repo->update($id, $data);
    }

    public function deleteUser($id)
    {
        return $this->repo->delete($id);
    }
}
