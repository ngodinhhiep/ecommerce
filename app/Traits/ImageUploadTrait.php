<?php 

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

trait ImageUploadTrait {

    public function uploadImage($request, $inputName, $path) {

        if($request->hasFile($inputName)) {
       
            $image = $request->{$inputName};
            $imageName = uniqid() . '.' . $image->getClientOriginalExtension();

            $image->move(public_path($path), $imageName);   // upload image in 'uploads' folder of the root 'public' directory
                                                            // public_path refers to 'public' directory

            return $path . '/' . $imageName ;
        }
    }

    // handling update image in the folder, by delete the old image path and replace it with the new image path
    public function updateImage($request, $inputName, $path, $oldPath=null) {

        if($request->hasFile($inputName)) {
            if(File::exists(public_path($oldPath))) {
                File::delete(public_path($oldPath));
            }

            $image = $request->{$inputName};
            $imageName = uniqid() . '.' . $image->getClientOriginalExtension();

            $image->move(public_path($path), $imageName);   // upload image in 'uploads' folder of the root 'public' directory
                                                            // public_path refers to 'public' directory

            return $path . '/' . $imageName ;
        }
    }

    // handling delete image in the folder
    public function deleteImage(string $path) {
        if(File::exists(public_path($path))) {
            File::delete(public_path($path));
        };
    }
}
?>