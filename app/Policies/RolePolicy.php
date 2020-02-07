<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class RolePolicy
{
    use HandlesAuthorization;
    protected $unautorised_msg = 'You are not authorised for this action.';
    /**
     * Determine if the given post can be updated by the user.
     *
     * @param  \App\User  $user
     * @return bool
     */
    public function update(User $user)
    {
        return ($user->user_permission->update_action === '1')
            ?Response::allow()
            :Response::deny($unautorised_msg);
    }

    /**
     * Determine if the given post can be updated by the user.
     *
     * @param  \App\User  $user
     * @return bool
     */
    public function create(User $user)
    {
        return ($user->user_permission->create_action === '1')
            ?Response::allow()
            :Response::deny($unautorised_msg);
    }

    /**
     * Determine if the given post can be updated by the user.
     *
     * @param  \App\User  $user
     * @return bool
     */
    public function delete(User $user)
    {
        return ($user->user_permission->delete_action === '1')
            ?Response::allow()
            :Response::deny($unautorised_msg);
    }
}
