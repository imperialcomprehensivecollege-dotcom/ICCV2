<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Post;

class PostPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('manage-posts');
    }

    public function view(User $user, Post $post): bool
    {
        return $user->hasPermissionTo('manage-posts');
    }

    public function create(User $user): bool
    {
        return $user->hasPermissionTo('manage-posts');
    }

    public function update(User $user, Post $post): bool
    {
        return $user->hasPermissionTo('manage-posts');
    }

    public function delete(User $user, Post $post): bool
    {
        return $user->hasPermissionTo('manage-posts');
    }
}
