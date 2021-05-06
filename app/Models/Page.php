<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;


class Page extends Model
{
    protected static function boot()
    {
        parent::boot();

        static::saved(function (self $model) {

            if ( $model->isDirty('slug')) {
                $model->generatePath();
            }
        });
    }

    public function reviews()
    {
        return $this->morphMany(Review::class, 'model','model_type', 'model_id')->active();
    }

    public function url()
    {
        return $this->morphOne(Url::class, 'model','model_type', 'model_id');
    }

    public function getUrl() {
        return route('page',['path'=>$this->url->path]);
    }

    public function generatePath()
    {
        $slug = $this->slug;
        $path =  $slug;

        if($this->url()->exists()) {
            $_path = Url::find($this->url->id);
            if ($_path->exists()) {
                $_path->path = $path;
                $_path->save();
            }
        } else {
            $_path = Url::create(['path' => $path]);
            $_path->model()->associate($this)->save();
        }
    }


    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }

    public function getTitle() {
        return $this->name;
    }

    public function getBackgroundImage() {
        if($this->header_background) {
        return '/storage/'.str_replace("\\", "/", $this->header_background);
        } else {
        return FALSE;
        }
    }

    public function getSeoTitle() {
        return isset($this->seo_title)?$this->seo_title:$this->getTitle();
    }

    public function delete()
    {
        $this->url()->delete();

        return parent::delete(); // TODO: Change the autogenerated stub
    }
}