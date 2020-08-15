<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VisiMisi extends Model
{
    protected $table = 'visimisi';
	
    protected $fillable = ['visi', 'misi', 'created_at', 'updated_at'];
}
