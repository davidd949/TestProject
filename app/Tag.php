<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    // Fetches all the articles belonging to its specific tag name.
    // ISS2 here with master merge conflict
    // this is iss2 again...
    public function articles() {
        return $this->belongsToMany(Article::class);
    }
}
