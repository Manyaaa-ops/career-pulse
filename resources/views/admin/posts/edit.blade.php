@extends('layouts.admin')

@section('title', 'Edit Post - Career Pulse')

@section('styles')
<style>
    .form-label {
        font-weight: 600;
        color: #374151;
    }
    .note-editor {
        border-radius: 8px;
    }
    .current-image {
        max-width: 200px;
        border-radius: 8px;
        margin-top: 10px;
    }
</style>
@endsection

@section('content')
<h2 class="mb-4">Edit Post</h2>

<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-8">
                    <div class="mb-3">
                        <label class="form-label">Title *</label>
                        <input type="text" name="title" class="form-control" value="{{ $post->title }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Category *</label>
                        <select name="category_id" class="form-select" required>
                            <option value="">Select Category</option>
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ $post->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Short Description *</label>
                        <textarea name="short_description" class="form-control" rows="3" required>{{ $post->short_description }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Content *</label>
                        <textarea name="content" id="summernote" rows="10" required>{{ $post->content }}</textarea>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label">Featured Image</label>
                        <input type="file" name="featured_image" class="form-control" accept="image/*">
                        @if($post->featured_image)
                        <p class="mt-2">Current Image:</p>
                        <img src="{{ asset('uploads/' . $post->featured_image) }}" class="current-image" alt="Current Image">
                        @endif
                        <small class="text-muted d-block mt-2">Recommended size: 800x400px</small>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Publish Date *</label>
                        <input type="date" name="publish_date" class="form-control" value="{{ $post->publish_date->format('Y-m-d') }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Status *</label>
                        <select name="status" class="form-select" required>
                            <option value="published" {{ $post->status == 'published' ? 'selected' : '' }}>Published</option>
                            <option value="draft" {{ $post->status == 'draft' ? 'selected' : '' }}>Draft</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="text-end">
                <a href="{{ route('admin.posts') }}" class="btn btn-secondary me-2">Cancel</a>
                <button type="submit" class="btn btn-primary">Update Post</button>
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