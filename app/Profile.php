<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Profile extends Eloquent
{
    protected $collection = 'profiles';
    protected $fillable = [
        '_id', 'iduser', 'photo', 'bio',
    ];
}
