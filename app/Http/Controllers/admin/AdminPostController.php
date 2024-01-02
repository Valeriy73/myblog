<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\post\StoreRequest;
use App\Http\Requests\admin\post\UpdateRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use function Laravel\Prompts\select;

class AdminPostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('admin.post.posts', compact('posts'));
    }

    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.post.create', compact('categories', 'tags'));
    }

    public function store(StoreRequest $request)
    {

        $data = $request->validated();

        $data['main_image'] = $request->file('main_image')->store('images', 'public');
        $data['preview_image'] = $request->file('preview_image')->store('images', 'public');
        if (isset($data['tag_ids'])){
            $tags = $data['tag_ids'];
            unset($data['tag_ids']);
        }
        $data['user_id'] = Auth::id();

        $post = Post::firstOrCreate($data);
        if (isset($tags)){
            foreach ($tags as $tag)
            {
                DB::table('post_tag')->insert([
                    'post_id' => $post->id,
                    'tag_id' => $tag,
                ]);
            }
        }
        return redirect()->route('admin.post.index');
    }

    public function edit($id)
    {
        $post = Post::find($id);
        $categories = Category::all();
        $tags = Tag::all();
        $editTags = $post->tag->pluck('id')->toArray();

        return view('admin.post.edit', compact('post', 'categories', 'tags', 'editTags'));
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
