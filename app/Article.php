<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    // Model automatically searches by 'id'

    // This searches by 'title' using the wildcard name which is article
    // for the 'show' controller. I haven't updated the rest of the controller
    // for educational purposes
    public function getRouteKeyName()
    {
        return 'title'; // Article::where('title', $article)
    }

    // This allows the controller to 'mass' fill and create a new article
    // Laravel provides automatic protection that prevents accidental updates/create
    protected $fillable = ['title', 'excerpt', 'body'];

    // Get get user (author) pertaining to the article
    public function user() {
        // NOTE: the function name 'user' plays an important role how laravel
        // automatically looks up the Article's foreign key. Ex: 'user' will trigger
        // laravel to look up a foreign key labeled as 'user_id' or 'author' will
        // be 'author_id'. So naming convention will matter
        return $this->belongsTo(User::class);

        // You may set the second arg as the real foreign key name
        // but keep the function name as anything you want aka 'author_id'
        #return $this->belongsTo(User::class, 'user_id');
    }

    public function tags() {
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }
}
