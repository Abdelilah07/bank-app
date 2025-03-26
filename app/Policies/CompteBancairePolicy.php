<?php

namespace App\Policies;

use App\Models\CompteBancaire;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class CompteBancairePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->usertype === 'admin';
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, CompteBancaire $compteBancaire): bool
    {
        // return $user->id === auth()->id();
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): Response
    {
        return $user->usertype === 'admin'
            ? Response::allow()
            : Response::deny('You are not authorized to create an account');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, CompteBancaire $compteBancaire): bool
    {
        return $user->usertype === 'admin';
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, CompteBancaire $compteBancaire): bool
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, CompteBancaire $compteBancaire): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, CompteBancaire $compteBancaire): bool
    {
        return false;
    }
}
