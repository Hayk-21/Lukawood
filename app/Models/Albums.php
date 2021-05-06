<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Albums extends Model
{
    protected $table = 'voyager_albums';
    protected $pagination=24;

    public  function images(){
        return $this->hasMany(AlbumsImage::class, 'voyager_albums_id')->orderBy('sort', 'ASC')->orderBy('id', 'ASC')->take($this->pagination);
    }

    public  function images_more($skip){
        return $this->hasMany(AlbumsImage::class, 'voyager_albums_id')->orderBy('sort', 'ASC')->orderBy('id', 'ASC')->skip($skip)->take($this->pagination)->get();
    }

    public  function images_count(){
        return $this->hasMany(AlbumsImage::class, 'voyager_albums_id')->count();
    }

}
