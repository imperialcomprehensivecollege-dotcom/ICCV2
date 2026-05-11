<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Admission;

class AdmissionPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('manage-admissions');
    }

    public function view(User $user, Admission $admission): bool
    {
        return $user->hasPermissionTo('manage-admissions');
    }

    public function update(User $user, Admission $admission): bool
    {
        return $user->hasPermissionTo('manage-admissions');
    }

    public function delete(User $user, Admission $admission): bool
    {
        return $user->hasPermissionTo('manage-admissions');
    }
}
