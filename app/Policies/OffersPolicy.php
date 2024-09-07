<?php

namespace App\Policies;

use App\Models\Offers;
use App\Models\Student;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\GenericUser;

class OffersPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Offers  $offers
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Offers $offers)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Offers  $offers
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(Student $user, Offers $offer)
    {
        return $user->id === $offer->student_id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Offers  $offers
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(Student $user, Offers $offer)
    {
        return $user->id === $offer->student_id;

    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Offers  $offers
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Offers $offers)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Offers  $offers
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Offers $offers)
    {
        //
    }
}
