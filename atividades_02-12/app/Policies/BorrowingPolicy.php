<?php

namespace App\Policies;

use App\Models\Borrowing;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class BorrowingPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Borrowing $borrowing): bool
    {
        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Borrowing $borrowing): bool
    {
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Borrowing $borrowing): bool
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Borrowing $borrowing): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Borrowing $borrowing): bool
    {
        return false;
    }

    /**
     * Só permite novo empréstimo se não tiver devoluões pendentes.
     */
    public function createBorrowing(Borrowing $borrowing): bool
    {
        // if (!$borrowing->returned_at) {};

            $borrow = Borrowing::all($borrowing->user_id);


        $borrowing->returned_at !== null;
    }
}
