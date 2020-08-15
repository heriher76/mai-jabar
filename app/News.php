<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\SearchTrait;

class News extends Model
{
    protected $table = 'news';

    protected $fillable = ['title', 'description', 'thumbnail', 'publish_status', 'slug', 'user_id'];

    use SearchTrait;

    public function user()
    {
    	return $this->belongsTo('App\User', 'user_id');
    }
}
