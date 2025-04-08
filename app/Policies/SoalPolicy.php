<?php

namespace App\Policies;

use App\Models\Soal;
use App\Models\User;
use App\Models\Paket;
use Illuminate\Auth\Access\Response;

class SoalPolicy
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
    public function view(User $user, Soal $soal): bool
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user, Paket $paket): bool
    {
        return $paket->user->id == $user->id && !$paket->status;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Soal $soal): bool
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Soal $soal): bool
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Soal $soal): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Soal $soal): bool
    {
        //
    }
    public function unpublish(User $user, Paket $paket): bool
    {
        return $user->id == 1 && $paket->status;
    }
}
