<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, SoftDeletes;

    /** 
     *  A posts belongs to a user
     *  Use this method to get the owner of the post 
     */          
    public function user(){
        return $this->belongsTo(User::class)->withTrashed();
    }

    /**
     *  Use this method to get the categories under a post
     */
    public function categoryPost(){
        return $this->hasMany(CategoryPost::class);
    }

    /**
     * Use this method to get all the comments of a post
     */
    public function comments(){
        return $this->hasMany(Comment::class)->latest();
    }

    /**
     *  Use this method to get the likes of a post
     */
    public function likes(){
        /**
         * Post->likes
         */
        return $this->hasMany(Like::class);
    }

    /**
     * Is the post being liked already? --> True or False
     * Return TRUE if the AUTH user already liked the post
     */
    public function isLiked(){
        # When you access the likes() --> with the parentheses, meaning we want to get the value of this function
        # When you access the likes -- whitout the parentheses, meaning wa want to access the attributes only
        return $this->likes()->where('user_id', Auth::user()->id)->exists();
    }


    
    
}
