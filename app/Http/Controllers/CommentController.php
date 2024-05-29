<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use App\Notifications\PostCommented;
use App\Notifications\NewCommentNotification;

class CommentController extends Controller
{
    //
    public function store(Request $request, Post $post)
    {
        $request->validate([
            'body' => 'required',
        ]);

       $comment= $post->comments()->create([
            'body' => $request->body,
            'user_id' => auth()->id(), // Assuming the user is authenticated
        ]);

        // $comment = new Comment();
        // $comment->body = $request->body;
        // $comment->user_id = auth()->id();
        // $comment->post_id = $post->id;
        // $comment->save();

        // $post->user->notify(new PostCommented($comment));
        $post->user->notify(new NewCommentNotification($comment));

        return redirect()->route('posts.store', $post->id)->with('success', 'Comment added successfully.');
        
    }

    public function destroy(Comment $comment)
    {
        
        $this->authorize('delete', $comment);
        $comment->delete();
       

        return back()->with('success', 'Comment deleted successfully.');
    }
}
