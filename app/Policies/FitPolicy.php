<?php

namespace App\Policies;

use App\Models\Fit;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class FitPolicy
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
    public function view(User $user, Fit $fit): bool
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
    public function update(User $user, Fit $fit): bool
    {
        return $user->role === "Super Admin";

    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Fit $fit): bool
    {
        return $user->role === "Super Admin";

    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Fit $fit): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Fit $fit): bool
    {
        //
    }
}
