<?php

namespace App\Classes;

class Image
{
    public static function getImage($image) {
        return '/storage/'.str_replace("\\", "/", $image);
    }
}
