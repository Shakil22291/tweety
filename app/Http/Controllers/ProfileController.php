<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function show(User $user)
    {
        return view('profile.show', [
            'user' => $user,
            'tweets' => $user->tweets
        ]);
    }

    public function edit(User $user)
    {
        return view('profile.edit', [
            'user' => $user
        ]);
    }

    public function update(User $user)
    {
        $atrributes = request()->validate([
            'name' => ['required', 'string', 'max:30'],
            'username' => ['required', 'string', 'max:30', Rule::unique('users')->ignore($user)],
            'email' => ['string', 'required', 'email', 'max:255', Rule::unique('users')->ignore($user)],
        ]);

        $user->update($atrributes);
        $user->description = request('description');
        $user->save();
        return request();
    }

    public function uploadAvatar(User $user)
    {
        request()->validate([
            'avatar' => 'file'
        ]);

        // Delete the old file
        if ($user->avatar !== "/images/default-avatar.jpeg") {
            File::delete(public_path($user->avatar));
        }

        $avatarPath = request('avatar')->store('avatars');
        $user->avatar = $avatarPath;
        $user->save();

        return $avatarPath;
    }
}
