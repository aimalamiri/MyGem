<?php

namespace App\Policies;

use App\Models\ScheduledClass;
use App\Models\User;

class ScheduledClassPolicy
{
    public function delete(User $user, ScheduledClass $scheduledClass): bool
    {
        return $user->user_id === $scheduledClass->instructor_id;
    }
}
