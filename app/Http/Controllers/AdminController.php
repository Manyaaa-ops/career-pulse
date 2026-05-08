<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class AdminController extends Controller
{
    public function login()
    {
        return view('admin.login');
    }

    public function loginCheck(Request $request)
    {
        $email = $request->email;
        $password = $request->password;

        $adminEmail = 'admin@careerpulse.com';
        $adminPassword = 'password123';

        if ($email === $adminEmail && $password === $adminPassword) {
            session(['admin_logged_in' => true]);
            return redirect()->route('admin.dashboard');
        }

        return redirect()->back()->with('error', 'Invalid credentials');
    }

    public function dashboard()
    {
        $totalPosts = Post::count();
        $publishedPosts = Post::where('status', 'published')->count();
        $draftPosts = Post::where('status', 'draft')->count();
        $totalCategories = Category::count();

        $recentPosts = Post::orderBy('created_at', 'desc')->take(5)->get();

        return view('admin.dashboard', compact(
            'totalPosts',
            'publishedPosts',
            'draftPosts',
            'totalCategories',
            'recentPosts'
        ));
    }

    public function posts()
    {
        $posts = Post::with('category')->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.posts.index', compact('posts'));
    }

    public function createPost()
    {
        $categories = Category::all();
        return view('admin.posts.create', compact('categories'));
    }

    public function storePost(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'short_description' => 'required|string',
            'content' => 'required|string',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'publish_date' => 'required|date',
            'status' => 'required|in:published,draft',
        ]);

        $slug = Str::slug($request->title, '-');

        $post = new Post();
        $post->title = $request->title;
        $post->slug = $slug;
        $post->category_id = $request->category_id;
        $post->short_description = $request->short_description;
        $post->content = $request->content;
        $post->publish_date = $request->publish_date;
        $post->status = $request->status;

        if ($request->hasFile('featured_image')) {
            $image = $request->file('featured_image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('uploads'), $imageName);
            $post->featured_image = $imageName;
        }

        $post->save();

        return redirect()->route('admin.posts')->with('success', 'Post created successfully!');
    }

    public function editPost($id)
    {
        $post = Post::findOrFail($id);
        $categories = Category::all();
        return view('admin.posts.edit', compact('post', 'categories'));
    }

    public function updatePost(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'short_description' => 'required|string',
            'content' => 'required|string',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'publish_date' => 'required|date',
            'status' => 'required|in:published,draft',
        ]);

        $post = Post::findOrFail($id);
        $post->title = $request->title;
        $post->slug = Str::slug($request->title, '-');
        $post->category_id = $request->category_id;
        $post->short_description = $request->short_description;
        $post->content = $request->content;
        $post->publish_date = $request->publish_date;
        $post->status = $request->status;

        if ($request->hasFile('featured_image')) {
            if ($post->featured_image && File::exists(public_path('uploads/' . $post->featured_image))) {
                File::delete(public_path('uploads/' . $post->featured_image));
            }
            $image = $request->file('featured_image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('uploads'), $imageName);
            $post->featured_image = $imageName;
        }

        $post->save();

        return redirect()->route('admin.posts')->with('success', 'Post updated successfully!');
    }

    public function deletePost($id)
    {
        $post = Post::findOrFail($id);
        if ($post->featured_image && File::exists(public_path('uploads/' . $post->featured_image))) {
            File::delete(public_path('uploads/' . $post->featured_image));
        }
        $post->delete();

        return redirect()->route('admin.posts')->with('success', 'Post deleted successfully!');
    }

    public function categories()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    public function storeCategory(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name',
        ]);

        $category = new Category();
        $category->name = $request->name;
        $category->slug = Str::slug($request->name, '-');
        $category->save();

        return redirect()->route('admin.categories')->with('success', 'Category created successfully!');
    }

    public function updateCategory(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,' . $id,
        ]);

        $category = Category::findOrFail($id);
        $category->name = $request->name;
        $category->slug = Str::slug($request->name, '-');
        $category->save();

        return redirect()->route('admin.categories')->with('success', 'Category updated successfully!');
    }

    public function deleteCategory($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('admin.categories')->with('success', 'Category deleted successfully!');
    }

    public function logout()
    {
        return redirect('/');
    }
}