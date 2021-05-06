<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;



class Url extends Model
{

    public $timestamps = false;
    protected $fillable = ['path','model_id','model_type'];

    public function model()
    {
        return $this->morphTo()->active();
    }
}
