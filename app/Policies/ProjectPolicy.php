<?php

namespace App\Policies;

use App\Models\Project;
use App\Models\User;
use App\Models\LeadDev;
use Illuminate\Auth\Access\Response;

class ProjectPolicy
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
    public function view(User $user, Project $project): bool
    {
        // Manager can view all projects
        if ($user->user_level == 0) {
            return true;
        }

        // Developer can view projects they are assigned to
        if ($user->user_level == 2 && $project->developers->contains($user->developer->id)) {
            return true;
        }

        // Lead Developer can view projects they are assigned to
        if ($user->user_level == 1) {
            // Check if the authenticated user is the lead developer for this project
            $leadDev = LeadDev::where('user_id', $user->id)->first();

            if ($leadDev && $project->leadDev->id == $leadDev->id) {
                return true;
            }
        }

        return false;
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
    public function update(User $user, Project $project): bool
    {
        return $user->user_level ==0;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Project $project): bool
    {
        return $user->user_level ==0;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Project $project): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Project $project): bool
    {
        //
    }
}
