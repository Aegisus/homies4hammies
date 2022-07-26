<?php
//handles image uploads
/**
 * Write code on Method
 *
 * @return response()
 */
if (! function_exists('imageUpload')) {
    function imageUpload($input_name,$folder_name,$user_id)
    {
        if(request()->hasFile($input_name)){
            // Get filename with the extension
            $filenameWithExt = request()->file($input_name)->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = request()->file($input_name)->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'_'. $user_id . '.' .$extension;
            // Upload Image
            $path = request()->file($input_name)->storeAs('public/'.$folder_name, $fileNameToStore);
            // // Delete file if exists
            // Storage::delete('public/'.$folder_name.'/'.$user->cover_image);
    
            // // Make thumbnails (Depreciated?)
            // $thumbStore = 'thumb.'.$filename.'_'.time().'.'.$extension;
            // $thumb = Image::make($request->file('cover_image')->getRealPath());
            // $thumb->resize(80, 80);
            // $thumb->save('storage/cover_images/'.$thumbStore);
            return $fileNameToStore;
        }
    }
}