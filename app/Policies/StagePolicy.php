<?php

namespace App\Policies;

use App\Stage;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Validation\Rule;

class StagePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return ($user->hasRole('Super Admin')||$user->hasRole('User')||$user->hasRole('Professeur'));
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\Stage  $stage
     * @return mixed
     */
    public function view(User $user, Stage $stage)
    {
        return ($user->hasRole('Super Admin')||$user->hasRole('User')||$user->hasRole('Professeur'));
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return ($user->hasRole('User'));
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Stage  $stage
     * @return mixed
     */
    public function update(User $user, Stage $stage)
    {
        return in_array($user->id,$stage->etudiants->pluck('user_id')->toArray());
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Stage  $stage
     * @return mixed
     */
    public function delete(User $user, Stage $stage)
    {
        return in_array($user->id,$stage->etudiants->pluck('user_id')->toArray());
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Stage  $stage
     * @return mixed
     */
    public function restore(User $user, Stage $stage)
    {
        return in_array($user->id,$stage->etudiants->pluck('user_id')->toArray());
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Stage  $stage
     * @return mixed
     */
    public function forceDelete(User $user, Stage $stage)
    {
        return ($user->hasRole('Super Admin'));
    }
}
