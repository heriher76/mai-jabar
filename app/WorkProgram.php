<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkProgram extends Model
{
    protected $table = 'work_program';
	
    protected $fillable = ['name', 'description'];
}
