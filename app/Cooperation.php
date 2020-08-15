<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cooperation extends Model
{
    protected $table = 'cooperations';
	
    protected $fillable = ['name', 'description', 'date', 'thumbnail', 'created_at', 'updated_at'];
}
