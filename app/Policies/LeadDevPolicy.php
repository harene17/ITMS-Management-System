<?php

namespace App\Policies;

use App\Models\LeadDev;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class LeadDevPolicy
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
    public function view(User $user): bool
    {
        return $user->user_level == 0;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->user_level == 0;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user): bool
    {
        return $user->user_level == 0;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user): bool
    {
        return $user->user_level == 0;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, LeadDev $leadDev): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, LeadDev $leadDev): bool
    {
        //
    }
}
