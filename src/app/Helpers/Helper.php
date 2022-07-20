<?php 

use Intervention\Image\Facades\Image;

function uploadImageBase64($image, $directory)
{
    // get extension
    $pos  = strpos($image, ';');
    $extension = explode('/', substr($image, 0, $pos))[1];
    // path
    $imgTitle = time().'-'.\Str::random(10).'.'.$extension;
    $path = $directory.$imgTitle;
    // save image content in file
    Image::make(file_get_contents($image))->save(public_path($path));
    return $path;
}

function errorMessage($message, $statusCode)
{
    return response([
        'status' => 'error',
        'message' => $message
    ],
    $statusCode);
}

function successMessage($message, $statusCode)
{
    return response([
        'status' => 'sucess',
        'message' => $message
    ],
    $statusCode);
}