<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Follow;

class FollowController extends Controller
{
    private $follow;

    public function __construct(Follow $follow){
        $this->follow = $follow;
    }

    /**
     * Method to use when storing the user being followed by the AUTH USER (Note: If you are the AUTH, you are always the follower)
     */
    public function store($user_id){
        /**
         * The  "$user_id"  - is the ID of the user you are following
         * AUTH::user()->id - is the ID of the follower (User who is currently loggdin)
         */
        $this->follow->follower_id = Auth::user()->id;  // the follower
        $this->follow->following_id = $user_id;         // the user being followed
        $this->follow->save();

        return redirect()->back();
    }

    /**
     * Method to use to unfollow a user
     */
    public function destroy($user_id){
        $this->follow
        ->where('follower_id', Auth::user()->id)   // the follower
        ->where('following_id', $user_id)         // the user being followed
        ->delete();

        return redirect()->back();
    }



}
