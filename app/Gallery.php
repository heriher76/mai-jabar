<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
	protected $table = 'galleries';
	
    protected $fillable = ['name', 'title', 'desc', 'type', 'created_at', 'updated_at'];
}
