<?php

namespace App\Policies;

use App\User;
use App\Permission;
use Illuminate\Auth\Access\HandlesAuthorization;

class PermissionPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        //
    }

    public function view(User $user, Permission $permission)
    {
        //
    }

    public function create(User $user)
    {
        //
    }

    public function update(User $user, Permission $permission)
    {
        //
    }

    public function delete(User $user, Permission $permission)
    {
        //
    }

    public function restore(User $user, Permission $permission)
    {
        //
    }

    public function forceDelete(User $user, Permission $permission)
    {
        //
    }
}
