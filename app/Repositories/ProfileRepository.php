<?php
namespace App\Repositories;

use App\Models\User;

class ProfileRepository implements ProfileRepositoryInterface{

    public function updateUser(User $user)
    {
        return $user->save();
    }
}
