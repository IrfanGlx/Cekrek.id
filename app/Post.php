<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Post extends Eloquent
{
	protected $collection = 'posts';
    protected $fillable = [
        'caption', 'description', 'file', 'by', 'created_at',
    ];
}
