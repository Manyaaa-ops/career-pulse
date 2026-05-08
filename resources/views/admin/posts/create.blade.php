@extends('layouts.admin')

@section('title', 'Create Post - Career Pulse')

@section('styles')
<style>
    .form-label {
        font-weight: 600;
        color: #374151;
    }
    .note-editor {
        border-radius: 8px;
    }
</style>
@endsection

@section('content')
<h2 class="mb-4">Create New Post</h2>

<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <div class="col-md-8">
                    <div class="mb-3">
                        <label class="form-label">Title *</label>
                        <input type="text" name="title" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Category *</label>
                        <select name="category_id" class="form-select" required>
                            <option value="">Select Category</option>
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Short Description *</label>
                        <textarea name="short_description" class="form-control" rows="3" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Content *</label>
                        <textarea name="content" id="summernote" rows="10" required></textarea>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label">Featured Image</label>
                        <input type="file" name="featured_image" class="form-control" accept="image/*">
                        <small class="text-muted">Recommended size: 800x400px</small>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Publish Date *</label>
                        <input type="date" name="publish_date" class="form-control" required value="{{ date('Y-m-d') }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Status *</label>
                        <select name="status" class="form-select" required>
                            <option value="published">Published</option>
                            <option value="draft">Draft</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="text-end">
                <a href="{{ route('admin.posts') }}" class="btn btn-secondary me-2">Cancel</a>
                <button type="submit" class="btn btn-primary">Create Post</button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $('#summernote').summernote({
            height: 300,
            placeholder: 'Write your content here...',
            toolbar: [
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']],
                ['insert', ['link', 'table', 'hr']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });
    });
</script>
@endsection