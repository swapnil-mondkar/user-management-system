<?php
/**
 * Copyright (c) 2025, All rights reserved.
 * Author: Swapnil Mondkar
 * Date: 2025-05-21
 * Description: UserRepository class for handling user-related data operations.
 * This class contains methods for retrieving, creating, updating, and deleting user records.
 */

namespace App\Repositories\V1;

use App\Models\V1\User;

class UserRepository
{
    public function all()
    {
        return User::all();
    }

    public function find($id): ?User
    {
        return User::find($id);
    }

    public function create(array $data): User
    {
        return User::create($data);
    }

    public function update($id, array $data): ?User
    {
        $user = $this->find($id);
        if (!$user) {
            return null;
        }
        $user->update($data);
        return $user;
    }

    public function delete($id): bool
    {
        $user = $this->find($id);
        if (!$user) {
            return false;
        }
        return (bool) $user->delete();
    }
}
