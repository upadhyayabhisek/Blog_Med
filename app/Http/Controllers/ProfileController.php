<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Services\PostService;
use App\Services\ProfileService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{

    protected ProfileService $profileService;
    public function __construct(ProfileService $profileService)
    {
        $this->profileService = $profileService;
    }

    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }


    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $data = $request->validated();
//        $image = $data['image'] ?? null;
//
//        if ($image instanceof \Illuminate\Http\UploadedFile) {
//            $imagePath = $image->store('avatar', 'public');
//            $data['image'] = $imagePath;
//        }
//
//        $request->user()->fill($data);
//
//        if ($request->user()->isDirty('email')) {
//            $request->user()->email_verified_at = null;
//        }
//
//        $request->user()->save();

        $this->profileService->updateUserProfile($request->user(),$data);
        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }


    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);
//        $user = $request->user();
//        Auth::logout();
//        $user->delete();
//        $request->session()->invalidate();
//        $request->session()->regenerateToken();
        $this->profileService->deleteUserProfile($request);
        return Redirect::to('/');
    }
}
