<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Like;

class LikeController extends Controller
{
    private $like;

    public function __construct(Like $like){
        $this->like = $like;
    }

    /**
     *  This method is going to store the like action
     */
    public function store($post_id){
        $this->like->user_id = Auth::user()->id; //owner of the like
        $this->like->post_id = $post_id;        //the post being liked
        $this->like->save();
        
        return redirect()->back();
    }

    /**
     * Destroy or Unlike
     */
    public function destroy($post_id){
        $this->like
            ->where('user_id', Auth::user()->id)
            ->where('post_id', $post_id)
            ->delete();
        
        # Same as: DELETE FROM likes WHERE user_id = Auth::user()->id; DELETE FROM likes WHERE post_id = Auth::user()->id;
        # Same as: DELETE FROM likes WHERE user_id = Auth::user()->id && post_id = $post_id;

            return redirect()->back();
    }
}
