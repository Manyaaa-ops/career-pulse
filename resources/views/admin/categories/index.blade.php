@extends('layouts.admin')

@section('title', 'Categories - Career Pulse')

@section('content')
<h2 class="mb-4">Categories</h2>

<div class="card mb-4">
    <div class="card-body">
        <form action="{{ route('admin.categories.store') }}" method="POST" class="d-flex gap-2">
            @csrf
            <input type="text" name="name" class="form-control" placeholder="Category Name" required>
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-plus me-1"></i>Add Category
            </button>
        </form>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td><code>{{ $category->slug }}</code></td>
                    <td>
                        <button class="btn btn-sm btn-info text-white" data-bs-toggle="modal" data-bs-target="#editModal{{ $category->id }}">
                            <i class="fas fa-edit"></i>
                        </button>
                        <form action="{{ route('admin.categories.delete', $category->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure? This will also delete all posts in this category.')">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>

                <div class="modal fade" id="editModal{{ $category->id }}" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="{{ route('admin.categories.update', $category->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="modal-header">
                                    <h5 class="modal-title">Edit Category</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label class="form-label">Category Name</label>
                                        <input type="text" name="name" class="form-control" value="{{ $category->name }}" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection