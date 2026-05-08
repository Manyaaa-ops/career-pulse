<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $latestPosts = Post::where('status', 'published')
            ->orderBy('publish_date', 'desc')
            ->take(6)
            ->get();
        $featuredPosts = Post::where('status', 'published')
            ->orderBy('publish_date', 'desc')
            ->take(3)
            ->get();

        return view('frontend.index', compact('categories', 'latestPosts', 'featuredPosts'));
    }

    public function posts()
    {
        $categories = Category::all();
        $posts = Post::where('status', 'published')
            ->orderBy('publish_date', 'desc')
            ->paginate(9);

        return view('frontend.posts', compact('posts', 'categories'));
    }

    public function postDetail($slug)
    {
        $post = Post::where('slug', $slug)->where('status', 'published')->firstOrFail();
        $relatedPosts = Post::where('category_id', $post->category_id)
            ->where('id', '!=', $post->id)
            ->where('status', 'published')
            ->take(3)
            ->get();

        return view('frontend.post-detail', compact('post', 'relatedPosts'));
    }
}