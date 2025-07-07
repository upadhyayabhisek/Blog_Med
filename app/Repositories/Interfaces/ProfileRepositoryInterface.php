<?php

namespace App\Repositories\Interfaces;

use App\Models\User;

interface ProfileRepositoryInterface
{
    public function updateUser(User $user);
    public function deleteUserAccount(User $user);
}





