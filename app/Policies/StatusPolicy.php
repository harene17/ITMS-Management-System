<?php

namespace App\Policies;

use App\Models\LeadDev;
use App\Models\Status;
use App\Models\User;
use App\Models\Project;
use Illuminate\Auth\Access\Response;

class StatusPolicy
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
    public function view(User $user, Status $status): bool
    {
        $project = $status->project;

        if ($user->user_level == 0) {
            // Manager can view all statuses
            return true;
        }

        if ($user->user_level == 2) {
            // Developer can view statuses for projects they are assigned to
            return $project->developers->contains($user->developer->id);
        }

        if ($user->user_level == 1) {
            // Lead Developer can view statuses for projects they are assigned to
            // user id in users table same as user_id in leadDev table
            return $project->leadDev->user_id == $user->id;
        }

        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user, Project $project): bool
    {
        if ($user->user_level == 1) {
            // Lead Developer can create status for projects they are assigned to
            return $project->leadDev->user_id == $user->id;
        }

        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Status $status): bool
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Status $status): bool
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Status $status): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Status $status): bool
    {
        //
    }
}
