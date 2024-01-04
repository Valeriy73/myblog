<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Tag;
use App\Http\Requests\CommentRequest;

class MainController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(4);
        $categories = Category::all();
        $tags = Tag::all();
        return view('main', compact('posts', 'categories', 'tags'));
    }

    public function single($post)
    {
        $post = Post::find($post);
        $category = $post->category->title;
        $comments = $post->comments;
        return view('single', compact('post', 'category', 'comments'));
    }

    public function categories()
    {
        $categories = Category::paginate(4);
        $tags = Tag::all();
        return view('category', compact('categories', 'tags'));
    }

    public function category($category)
    {
        $category = Category::find($category);
        $posts = $category->posts;
        $tags = Tag::all();
        $categories = Category::all();
        return view('categoryPosts', compact('category', 'categories','tags', 'posts'));
    }

    public function tags()
    {
        $tags = Tag::paginate(4);
//        $tags = Tag::all();
        $categories = Category::all();
        return view('tag', compact('categories', 'tags'));
    }

    public function tag($tag)
    {
        $tag = Tag::find($tag);
        $posts = $tag->posts;
        $tags = Tag::all();
        $categories = Category::all();
        return view('tagPosts', compact('tag', 'categories','tags', 'posts'));
    }

    public function comment(CommentRequest $request)
    {
        $data = $request->validated();
        Comment::create($data);

        return redirect()->back();
    }
}
