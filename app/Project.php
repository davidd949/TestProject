<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    // Find the user that created the project
    public function user() {
        // select * from user where project_id = $this project id
        return $this->belongsTo(User::class);
        // Other extra features: hasOne, hasmany, belongsTo, belongsToMany
    }
}
