<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\post\StoreRequest;
use App\Http\Requests\admin\post\UpdateRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class AdminPostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('admin.post.posts', compact('posts'));
    }

    public function create()
    {
        return view('admin.post.create');
    }

    public function store(StoreRequest $request)
    {

        $data = $request->validated();

        $data['main_image'] = $request->file('main_image')->store('images', 'public');
        $data['preview_image'] = $request->file('preview_image')->store('images', 'public');

        Post::firstOrCreate($data);

        return redirect()->route('admin.post.index');
    }

    public function edit($id)
    {
        $post = Post::find($id);
        return view('admin.post.edit', compact('post'));
    }

    public function update(UpdateRequest $request, Post $post)
    {
        $data = $request->validated();

        if (isset($data['main_image'])) {
            $data['main_image'] = $request->file('main_image')->store('images', 'public');
        }
        if (isset($data['preview_image'])) {
            $data['preview_image'] = $request->file('preview_image')->store('images', 'public');
        }
        Post::where('id', $post->id)->update($data);

        return redirect()->route('admin.post.index');
    }

    public function delete(Post $post)
    {
        Post::where('id', $post->id)->delete();

        return redirect()->route('admin.post.index');
    }

}
