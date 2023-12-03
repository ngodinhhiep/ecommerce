<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Traits\ImageUploadTrait;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class VendorProfileController extends Controller
{
    use ImageUploadTrait;
    
    
    public function index() {
        return view('vendor.dashboard.profile');
    }

    public function updateProfile(Request $request) {
        $request->validate([
            'name' => ['required', 'min:5', 'max:50'],
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

        Auth::user()->update([
            'password' => bcrypt($request->password)
        ]);

        toastr()->success('Password updated successfully');
        return redirect()->back();
    }
}
