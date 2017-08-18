<?php namespace App\Model;

use Jenssegers\Mongodb\Eloquent\Model;

class Collection extends Model
{
    public function preference()
    {
        return $this->hasMany('App\Model\Preference');
    }
}
