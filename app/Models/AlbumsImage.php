<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AlbumsImage extends Model
{
    protected $table = 'voyager_albums_image';

    public function getImage() {
        return '/storage/'.$this->image;
    }
}
