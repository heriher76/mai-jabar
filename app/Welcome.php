<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Welcome extends Model
{
    protected $table = 'welcomes';
	
    protected $fillable = ['name', 'title', 'description', 'image'];
}
