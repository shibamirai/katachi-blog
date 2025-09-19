<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminPostRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class AdminPostController extends Controller
{
    public function index()
    {
        //
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

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
