<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use function Pest\Laravel\json;

class FollowerController extends Controller
{
    public function followUnfollow(User $user): \Illuminate\Http\JsonResponse
    {
        $user->followers()->toggle(auth()->user());
        return response()->json([
            'followers'=>$user->followers()->count(),
            ]);
    }
}
