@extends('layouts.admin')

@section('title', 'Dashboard - Career Pulse')

@section('content')
<h2 class="mb-4">Dashboard</h2>

<div class="row g-4 mb-4">
    <div class="col-md-3">
        <div class="card bg-primary text-white">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="mb-0">Total Posts</h6>
                        <h2 class="mb-0">{{ $totalPosts }}</h2>
                    </div>
                    <i class="fas fa-file-alt fa-2x opacity-50"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card bg-success text-white">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="mb-0">Published</h6>
                        <h2 class="mb-0">{{ $publishedPosts }}</h2>
                    </div>
                    <i class="fas fa-check-circle fa-2x opacity-50"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card bg-warning text-white">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="mb-0">Drafts</h6>
                        <h2 class="mb-0">{{ $draftPosts }}</h2>
                    </div>
                    <i class="fas fa-edit fa-2x opacity-50"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card bg-info text-white">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="mb-0">Categories</h6>
                        <h2 class="mb-0">{{ $totalCategories }}</h2>
                    </div>
                    <i class="fas fa-folder fa-2x opacity-50"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Recent Posts</h5>
                <a href="{{ route('admin.posts.create') }}" class="btn btn-primary btn-sm">
                    <i class="fas fa-plus me-1"></i>Add New Post
                </a>
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($recentPosts as $post)
                        <tr>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->category->name }}</td>
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
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection