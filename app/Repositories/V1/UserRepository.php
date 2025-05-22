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
use Illuminate\Support\Facades\Cache;

class UserRepository
{
    protected $cacheTTL = 60 * 5; // Cache time (5 minutes)

    public function all()
    {
        return Cache::remember('users:all', $this->cacheTTL, function () {
            $users = User::all();
            if ($users->isEmpty()) {
                return null;
            }
            return $users;
        }) ?? collect();
    }

    public function find($id): ?User
    {
        return Cache::remember("users:{$id}", $this->cacheTTL, function () use ($id) {
            $user = User::find($id);
            if (is_null($user)) {
                return null;
            }
            return $user;
        });
    }

    public function create(array $data): User
    {
        $user = User::create($data);
        Cache::forget('users:all');
        Cache::put("users:{$user->id}", $user, $this->cacheTTL);
        return $user;
    }

    public function update($id, array $data): ?User
    {
        $user = $this->find($id);
        if (!$user) {
            return null;
        }
        $user->update($data);
        Cache::put("users:{$id}", $user, $this->cacheTTL);
        Cache::forget('users:all');
        return $user;
    }

    public function delete($id): bool
    {
        $user = $this->find($id);
        if (!$user) {
            return false;
        }
        $deleted = (bool) $user->delete();
        if ($deleted) {
            Cache::forget("users:{$id}");
            Cache::forget('users:all');
        }
        return $deleted;
    }
}
