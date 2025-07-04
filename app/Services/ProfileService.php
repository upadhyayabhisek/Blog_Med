<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\ProfileRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileService
{

    protected $profileRepository;
    public function __construct(ProfileRepository $profileRepository)
    {
        $this->profileRepository = $profileRepository;
    }
    public function updateUserProfile(User $user, array $data): void{
        $image = $data['image'] ?? null;

        if ($image instanceof \Illuminate\Http\UploadedFile) {
            $imagePath = $image->store('avatar', 'public');
            $data['image'] = $imagePath;
        }
        $user->fill($data);
        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $this->profileRepository->updateUser($user);
    }

    public function deleteUserProfile(Request $request): void
    {
        $user = $request->user();
        Auth::logout();
        $user->delete();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    }
}
