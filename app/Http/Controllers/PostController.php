<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->get('q');
        $posts = Post::where('status', 'published')
            ->where('title', 'like', '%' . $query . '%')
            ->orderBy('publish_date', 'desc')
            ->get();

        return response()->json(['posts' => $posts]);
    }

    public function filterByCategory(Request $request, $categoryId)
    {
        $posts = Post::where('status', 'published')
            ->where('category_id', $categoryId)
            ->orderBy('publish_date', 'desc')
            ->get();

        return response()->json(['posts' => $posts]);
    }

    public function filterByDate(Request $request)
    {
        $order = $request->get('order', 'desc');
        $posts = Post::where('status', 'published')
            ->orderBy('publish_date', $order)
            ->get();

        return response()->json(['posts' => $posts]);
    }

    public function filter(Request $request)
    {
        $query = Post::where('status', 'published');

        if ($request->has('category_id') && $request->category_id) {
            $query->where('category_id', $request->category_id);
        }

        if ($request->has('q') && $request->q) {
            $query->where('title', 'like', '%' . $request->q . '%');
        }

        if ($request->has('date') && $request->date) {
            $order = $request->date === 'oldest' ? 'asc' : 'desc';
            $query->orderBy('publish_date', $order);
        } else {
            $query->orderBy('publish_date', 'desc');
        }

        $posts = $query->get();

        return response()->json(['posts' => $posts]);
    }
}