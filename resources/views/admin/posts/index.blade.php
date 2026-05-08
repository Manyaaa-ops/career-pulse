@extends('layouts.admin')

@section('title', 'Posts - Career Pulse')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="mb-0">All Posts</h2>
    <a href="{{ route('admin.posts.create') }}" class="btn btn-primary">
        <i class="fas fa-plus me-2"></i>Add New Post
    </a>
</div>

<div class="card">
    <div class="card-body">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Featured Image</th>
                    <th>Status</th>
                    <th>Publish Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($posts as $post)
                <tr>
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->category->name }}</td>
                    <td>
                        @if($post->featured_image)
                        <img src="{{ asset('uploads/' . $post->featured_image) }}" alt="" style="width: 60px; height: 40px; object-fit: cover; border-radius: 4px;">
                        @else
                        <span class="text-muted">No Image</span>
                        @endif
                    </td>
                    <td>
                        <span class="status-{{ $post->status }}">{{ ucfirst($post->status) }}</span>
                    </td>
                    <td>{{ $post->publish_date->format('d M Y') }}</td>
                    <td>
                        <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-sm btn-info text-white">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('admin.posts.delete', $post->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this post?')">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        {{ $posts->links() }}
    </div>
</div>
@endsection