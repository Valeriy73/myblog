<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        $categories = Category::all();
        return view('main', compact('posts', 'categories'));
    }

    public function single($post)
    {
        $post = Post::find($post);
        return view('single', compact('post'));
    }
}
