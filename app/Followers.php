<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Followers extends Eloquent
{
    protected $collection = 'followers';
    protected $fillable = [
        '_id', 'nama', 'following',
    ];
}
