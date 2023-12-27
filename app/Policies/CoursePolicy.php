<?php

namespace App\Policies;

use App\Models\Course;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class CoursePolicy
{

    public function viewAny(User $user): bool
    {
        return  ($user->role->name == 'admin');
    }

    public function view(User $user): bool
    {
        return  ($user->role->name == 'user');
    }

    public function create(User $user): bool
    {
        return  ($user->role->name == 'teacher'|| $user->role->name == 'admin');
    }

    public function update(User $user, Course $course): bool
    {
        return  ($user->role->name == 'teacher' && 'admin');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Course $course): bool
    {
        return  ($user->role->name != 'teacher');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Course $course): bool
    {
        return  ($user->role->name != 'teacher');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Course $course): bool
    {
        return  ($user->role->name != 'teacher');
    }
}
