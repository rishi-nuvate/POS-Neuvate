<?php

namespace App\Policies;

use App\Models\BaseStockCategory;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class BaseStockCategoryPolicy
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
    public function view(User $user, BaseStockCategory $baseStockCategory): bool
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
    public function update(User $user, BaseStockCategory $baseStockCategory): bool
    {
        return $user->role === "Super Admin";

    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, BaseStockCategory $baseStockCategory): bool
    {
        return $user->role === "Super Admin";

    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, BaseStockCategory $baseStockCategory): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, BaseStockCategory $baseStockCategory): bool
    {
        //
    }
}
