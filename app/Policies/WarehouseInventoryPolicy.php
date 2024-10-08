<?php

namespace App\Policies;

use App\Models\User;
use App\Models\WarehouseInventory;
use Illuminate\Auth\Access\Response;

class WarehouseInventoryPolicy
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
    public function view(User $user, WarehouseInventory $warehouseInventory): bool
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
    public function update(User $user, WarehouseInventory $warehouseInventory): bool
    {
        return $user->role === "Super Admin";

    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, WarehouseInventory $warehouseInventory): bool
    {
        return $user->role === "Super Admin";
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, WarehouseInventory $warehouseInventory): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, WarehouseInventory $warehouseInventory): bool
    {
        //
    }
}
