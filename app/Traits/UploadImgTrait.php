<?php


namespace App\Traits;
trait UploadIMGTrait
{
    public function uploadImg($file, $directory)
    {

        $filename = rand(1, 5000) . '.' . $file->getClientOriginalExtension();
        $file->move(public_path($directory), $filename);
        return $directory . '/' . $filename;
        
    }

}