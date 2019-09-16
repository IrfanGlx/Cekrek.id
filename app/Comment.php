<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Comment extends Eloquent
{
	protected $collection = 'comments';
    protected $fillable = [
        'idpost', 'comment', 'iduser',
    ];
    public function user(){
    	return $this->belongsTo('App\User','iduser','_id');
    }
}
