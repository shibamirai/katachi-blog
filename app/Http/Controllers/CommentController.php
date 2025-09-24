<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CommentController extends Controller
{
    public function store(Post $post, StoreCommentRequest $request)
    {
        $request->validated();
        
        $post->comments()->create([
            'user_id' => request()->user()->id,
            'body' => request('body')
        ]);
        
        return back();
    }

    public function update(StoreCommentRequest $request, Comment $comment)
    {
        $attributes = $request->validated();
        
        $comment->update($attributes);

        return back()->with('success', 'コメントを修正しました！');
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();
        return back()->with('success', 'コメントを削除しました！');
    }
}
