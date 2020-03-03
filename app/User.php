<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable. BEEWP BEPPEP
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types. dfs
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Users can have many articles so find and return all
    public function articles() {
        // select * from articles where user_id = cur user id
        return $this->hasMany(Article::class);
    }

    // Users can have many projects so find and return all
    public function projects() {
        // select * from projects where user_id = cur user id
        return $this->hasMany(Project::class);
    }

    // Example of invoking the projects method
    # $user = User::find(1); // select * from user where id = 1
    # $user->projects; // select * from projects where user_id = 1
    // A few extra commands to filter the query results
    # $user->projects->first();
    # $user->projects->last();
     # $user->projects->find();
}
