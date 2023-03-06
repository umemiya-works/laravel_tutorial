<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Todo;
use Illuminate\Auth\Access\HandlesAuthorization;

class TodoPolicy
{
    use HandlesAuthorization;
    public function update(User $user, Todo $todo)
    {
        return $user->id == $todo->user_id;
    }

    public function delete(User $user, Todo $todo)
    {
        return $user->id == $todo->user_id;
    }
}
