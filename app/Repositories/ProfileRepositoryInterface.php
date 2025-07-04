<?php

namespace App\Repositories;

use App\Models\User;

interface ProfileRepositoryInterface
{
    public function updateUser(User $user);
}





