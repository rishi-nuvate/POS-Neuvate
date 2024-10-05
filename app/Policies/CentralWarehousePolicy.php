<?php

namespace App\Policies;

use App\Models\CentralWarehouse;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class CentralWarehousePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, CentralWarehouse $centralWarehouse): bool
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->role === "Super Admin";
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, CentralWarehouse $centralWarehouse): bool
    {
        return $user->role === "Super Admin";
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, CentralWarehouse $centralWarehouse): bool
    {
        return $user->role === "Super Admin";
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, CentralWarehouse $centralWarehouse): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, CentralWarehouse $centralWarehouse): bool
    {
        //
    }
}
