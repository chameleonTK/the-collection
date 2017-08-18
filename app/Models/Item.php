<?php namespace App\Model;

use Jenssegers\Mongodb\Eloquent\Model;

class Item extends Model
{
    protected $connection = 'mongodb';
}
