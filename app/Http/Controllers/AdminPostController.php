<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminPostRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class AdminPostController extends Controller
{
    public function index()
    {
        return view('admin.posts.index', [
            'posts' => Post::where('user_id', Auth::user()->id)->latest()->paginate(10)
        ]);
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store(AdminPostRequest $request)
    {
        $attributes = array_merge($request->validated(), [
            'user_id' => $request->user()->id,
            'slug' => date('YmdHis'),   // スラッグには投稿年月日時分秒を使用することにする
            'thumbnail' => request()->file('thumbnail')?->store('thumbnails', 'public')
        ]);
        
        Post::create($attributes);

        return redirect('/');
    }

    public function edit(Post $post)
    {
        Gate::authorize('update', $post);
  
        return view('admin.posts.edit', ['post' => $post]);
    }

    public function update(AdminPostRequest $request, Post $post)
    {
        Gate::authorize('update', $post);

        $attributes = $request->validated();
        if ($attributes['thumbnail'] ?? false) {
            $attributes['thumbnail'] = request()->file('thumbnail')?->store('thumbnails', 'public');
        }
        
        $post->update($attributes);

        return back()->with('success', '更新しました！');
    }

    public function destroy(Post $post)
    {
        Gate::authorize('delete', $post);

        $post->delete();

        return back()->with('success', '削除しました！');
    }
}
