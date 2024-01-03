<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

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
        return view('single', compact('post', 'category'));
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
}
