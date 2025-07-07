<?php
namespace App\Repositories;

use App\Models\User;
use App\Repositories\Interfaces\ProfileRepositoryInterface;

class ProfileRepository implements ProfileRepositoryInterface{

    public function updateUser(User $user)
    {
        return $user->save();
    }

    public function deleteUserAccount(User $user):void
    {
        $user->delete();
    }
}
