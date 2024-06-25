<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    private $comment;

    public function __construct(Comment $comment){
        $this->comment = $comment;
    }

    /**
     * A method to store comments into comments table
     */
    public function store(Request $request, $post_id){
        # Validat data coming from the form
        $request->validate(
            [
                'comment_body'. $post_id => 'required|max:150'
            ],
            [
                'comment_body'. $post_id. '.required' => 'You cannot submit an empty comment',
                'comment_body'. $post_id. '.max' => 'The comment must not have more than 150 characters.'
            ]
    );

        $this->comment->body    = $request->input('comment_body'. $post_id); // actual comments + post id
        $this->comment->user_id = Auth::user()->id; //the owner of the comment
        $this->comment->post_id = $post_id;         //the post being commented on
        $this->comment->save();

        return redirect()->back();
    }

    /**
     * This method will delete the comment
     */

    public function destroy($id){
        $this->comment->destroy($id);   //Same as: DELETE * FROM comments WHERE id = $id;
        return redirect()->back();
    }
}
