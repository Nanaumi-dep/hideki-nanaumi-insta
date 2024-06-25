<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\SoftDeletes;   //inherit SoftDeletes so we can use it

class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    const ADMIN_ROLE_ID = 1; //administrator
    const USER_ROLE_ID = 2;  //the regular user

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Use this method to get all the posts of a user
     */
    public function posts(){
        return $this->hasMany(Post::class);
    }

    /**
     * Use this method to get all the followers of a user
     */
    public function followers(){
        return $this->hasMany(Follow::class, 'following_id');
        # To get all the followers, we can select the "follong_id" from the Follow model
    }

    /**
     * Use this method to get all the users that the users is following 
     */
    public function following(){
        return $this->hasMany(Follow::class, 'follower_id');
    }

    /**
     * This method is use to check if the user is already being followed
     */
    public function isFollowed(){
        return $this->followers()->where('follower_id', Auth:: user()->id)->exists();
        /**
         * The Aut::user()->id --- is the follower
         * First, get all the followers of the user ( $this->followers() ).Then from that lists, 
         * search for the Auth user from the follower column ( where() )
         */
        
    }

    /**
     * A post belongs to a user
     */

}
