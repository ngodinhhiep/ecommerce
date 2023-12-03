<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Traits\ImageUploadTrait;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Exists;

class AdminProfileController extends Controller
{
    use ImageUploadTrait;

    
    public function index() {
        return view('admin.profile.index');
    }

    public function updateProfile(Request $request) {
        $request->validate([
            'name' => ['required', 'max:100'],
            'email' => ['required', 'email', Rule::unique('users', 'email')->ignore(Auth::user()->id)],
            'image' => ['image', 'max:4096']
        ]);

        $user = Auth::user();

        /** Handle file upload */
        $imagePath = $this->uploadImage($request, 'image', 'uploads');

        $user->name = $request->name;
        $user->email = $request->email;
        $user->image = $imagePath;
        $user->save();

        toastr()->success('Profile updated successfully!');
        return redirect()->back();
    }

    public function updatePassword(Request $request) {
       $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', 'confirmed', 'min:8']
       ]);

        // Check if the new password is the same as the current password
        if (Hash::check($request->password, $request->user()->password)) {
        // The new password is the same as the current password, return with an error.
        return back()->withErrors(['password' => 'The new password must be different from the current password']);
    }

       $request->user()->update([
            'password' => bcrypt($request->password)
       ]);

       toastr()->success('Password updated successfully!');
       return redirect()->back();
    }
}
