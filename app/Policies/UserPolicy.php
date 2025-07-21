<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    /**
     * Create a new policy instance.
     */
    public function viewAny(User $user)
    {
      return $user-> isAdmin();
    }
    public function view(User $user, User $model):bool{
        return $user->id===$model->id||$user->isAdmin();
    }
    public function create(User $user, User $model):bool{
        return true;
    }
    public function update(User $user, User $model):bool{
        return $user->id===$model->id||$user->isAdmin();
    }
    public function delete(User $user, User $model):bool{
        return $user->id===$model->id||$user->isAdmin();
    }

}
