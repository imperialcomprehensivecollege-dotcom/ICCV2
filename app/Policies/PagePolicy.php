<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Page;

class PagePolicy
{
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('manage-pages');
    }

    public function view(User $user, Page $page): bool
    {
        return $user->hasPermissionTo('manage-pages');
    }

    public function create(User $user): bool
    {
        return $user->hasPermissionTo('manage-pages');
    }

    public function update(User $user, Page $page): bool
    {
        return $user->hasPermissionTo('manage-pages');
    }

    public function delete(User $user, Page $page): bool
    {
        return $user->hasPermissionTo('manage-pages');
    }
}
