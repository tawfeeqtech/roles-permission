<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function __invoke()
    {
        return view('admin.pages.profile');
    }

    public function update(ProfileUpdateRequest $request)
    {

        // Task: fill in the code here to update name and email
        // Also, update the password if it is set
        auth()->user()->update([
            'email' => $request->email,
            'name' => $request->name,
            'phone' => $request->phone,
        ]);

        if ($request->filled('password')) {
            auth()->user()->update([
                'password' => Hash::make($request->password),
            ]);
        }
        return redirect()->route('users.profile')->with('success', 'Profile updated.');
    }
}
