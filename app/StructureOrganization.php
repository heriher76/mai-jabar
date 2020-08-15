<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StructureOrganization extends Model
{
	protected $table = 'structure_organization';

    protected $fillable = ['name', 'title', 'email', 'image', 'ttl', 'religion', 'schools', 'organizations', 'jobs', 'achievements', 'description'];
}
