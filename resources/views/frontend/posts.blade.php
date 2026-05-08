@extends('layouts.main')

@section('title', 'All Updates - Career Pulse')

@section('styles')
<style>
    .filter-section-glass {
        background: var(--glass);
        backdrop-filter: blur(20px);
        border: 1px solid var(--glass-border);
        padding: 28px;
        border-radius: 24px;
        margin-bottom: 50px;
    }
    .form-select-glass {
        background: rgba(255, 255, 255, 0.05);
        border: 2px solid var(--glass-border);
        border-radius: 14px;
        padding: 16px;
        color: var(--white);
        transition: all 0.3s ease;
    }
    .form-select-glass:focus {
        border-color: var(--cyan);
        background: rgba(255, 255, 255, 0.08);
        color: var(--white);
        outline: none;
        box-shadow: 0 0 0 4px rgba(0, 168, 232, 0.15);
    }
    .form-select-glass option { background: var(--dark-blue); color: var(--white); }
</style>
@endsection

@section('content')
@php
$listingImages = [
    'https://images.unsplash.com/photo-1522202176988-66273c2fd55f?w=500&h=300&fit=crop',
    'https://images.unsplash.com/photo-1553877522-43269d4ea984?w=500&h=300&fit=crop',
    'https://images.unsplash.com/photo-1504674900247-0877df9cc836?w=500&h=300&fit=crop',
    'https://images.unsplash.com/photo-1523240795612-9a054b0db644?w=500&h=300&fit=crop',
    'https://images.unsplash.com/photo-1516321318423-f06f85e504b3?w=500&h=300&fit=crop',
    'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=500&h=300&fit=crop',
    'https://images.unsplash.com/photo-1519389950473-47ba0277781c?w=500&h=300&fit=crop',
    'https://images.unsplash.com/photo-1531482615713-2afd69097998?w=500&h=300&fit=crop',
    'https://images.unsplash.com/photo-1560472354-b33ff0c44a43?w=500&h=300&fit=crop',
    'https://images.unsplash.com/photo-1600880292203-757bb62b4baf?w=500&h=300&fit=crop',
    'https://images.unsplash.com/photo-1573497019940-1c28c88b4f3e?w=500&h=300&fit=crop',
    'https://images.unsplash.com/photo-1551836022-d5d88e9218df?w=500&h=300&fit=crop'
];
@endphp

<section class="section-padding" style="padding-top: 140px;">
    <div class="container">
        <h2 class="section-heading" style="color: var(--white);">All Updates</h2>

        <div class="filter-section-glass">
            <div class="row g-3 align-items-center">
                <div class="col-md-5">
                    <div class="input-group">
                        <span class="input-group-text" style="background: linear-gradient(135deg, var(--cyan), var(--bright-cyan)); border: none; color: var(--midnight); font-weight: 600;">
                            <i class="fas fa-search"></i>
                        </span>
                        <input type="text" id="searchInput" class="form-control glass-input" placeholder="Search updates..." value="{{ request('q') }}">
                    </div>
                </div>
                <div class="col-md-3">
                    <select id="categoryFilter" class="form-select form-select-glass">
                        <option value="" style="background: var(--dark-blue);">All Categories</option>
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <select id="dateFilter" class="form-select form-select-glass">
                        <option value="newest" {{ request('date') == 'newest' ? 'selected' : '' }}>Newest First</option>
                        <option value="oldest" {{ request('date') == 'oldest' ? 'selected' : '' }}>Oldest First</option>
                    </select>
                </div>
                <div class="col-md-1">
                    <button class="btn btn-glow w-100" onclick="applyFilters()">
                        <i class="fas fa-filter"></i>
                    </button>
                </div>
            </div>
        </div>

        <div class="loading-spinner" id="loadingSpinner">
            <i class="fas fa-spinner fa-spin"></i>
            <p class="mt-3" style="color: var(--white);">Loading...</p>
        </div>

        <div class="row g-4" id="postsContainer">
            @foreach($posts as $index => $post)
            <div class="col-md-6 col-lg-4">
                <div class="post-card-glass">
                    <div class="post-image-wrapper">
                        @if($post->featured_image)
                        <img src="{{ asset('uploads/' . $post->featured_image) }}" alt="{{ $post->title }}">
                        @else
                        <img src="{{ $listingImages[$index % count($listingImages)] }}" alt="{{ $post->title }}">
                        @endif
                    </div>
                    <div class="post-card-body">
                        <span class="post-badge">{{ $post->category->name }}</span>
                        <h5 class="post-title">{{ $post->title }}</h5>
                        <p class="post-excerpt">{{ $post->short_description }}</p>
                        <div class="d-flex justify-content-between align-items-center mt-3 pt-3" style="border-top: 1px solid var(--glass-border);">
                            <small style="color: var(--cyan);"><i class="far fa-calendar me-1"></i>{{ $post->publish_date->format('d M Y') }}</small>
                            <a href="{{ route('post.detail', $post->slug) }}" class="btn-ghost">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="pagination-wrap">
            {{ $posts->links('pagination::bootstrap-5') }}
        </div>
    </div>
</section>
@endsection

@section('scripts')
<script>
    var listingImages = [
        'https://images.unsplash.com/photo-1522202176988-66273c2fd55f?w=500&h=300&fit=crop',
        'https://images.unsplash.com/photo-1553877522-43269d4ea984?w=500&h=300&fit=crop',
        'https://images.unsplash.com/photo-1504674900247-0877df9cc836?w=500&h=300&fit=crop',
        'https://images.unsplash.com/photo-1523240795612-9a054b0db644?w=500&h=300&fit=crop',
        'https://images.unsplash.com/photo-1516321318423-f06f85e504b3?w=500&h=300&fit=crop',
        'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=500&h=300&fit=crop',
        'https://images.unsplash.com/photo-1519389950473-47ba0277781c?w=500&h=300&fit=crop',
        'https://images.unsplash.com/photo-1531482615713-2afd69097998?w=500&h=300&fit=crop',
        'https://images.unsplash.com/photo-1560472354-b33ff0c44a43?w=500&h=300&fit=crop',
        'https://images.unsplash.com/photo-1600880292203-757bb62b4baf?w=500&h=300&fit=crop',
        'https://images.unsplash.com/photo-1573497019940-1c28c88b4f3e?w=500&h=300&fit=crop',
        'https://images.unsplash.com/photo-1551836022-d5d88e9218df?w=500&h=300&fit=crop'
    ];

    function applyFilters() {
        var search = $('#searchInput').val();
        var category = $('#categoryFilter').val();
        var date = $('#dateFilter').val();

        $('#loadingSpinner').show();
        $('#postsContainer').hide();

        $.ajax({
            url: '{{ route("ajax.filter") }}',
            type: 'GET',
            data: { q: search, category_id: category, date: date },
            success: function(response) {
                var html = '';
                if(response.posts.length > 0) {
                    response.posts.forEach(function(post, index) {
                        var imageUrl = post.featured_image ? '/uploads/' + post.featured_image : listingImages[index % listingImages.length];
                        html += '<div class="col-md-6 col-lg-4">';
                        html += '<div class="post-card-glass">';
                        html += '<div class="post-image-wrapper"><img src="' + imageUrl + '" alt="' + post.title + '"></div>';
                        html += '<div class="post-card-body">';
                        html += '<span class="post-badge">' + post.category.name + '</span>';
                        html += '<h5 class="post-title">' + post.title + '</h5>';
                        html += '<p class="post-excerpt">' + post.short_description + '</p>';
                        html += '<div class="d-flex justify-content-between align-items-center mt-3 pt-3" style="border-top: 1px solid var(--glass-border);">';
                        html += '<small style="color: var(--cyan);"><i class="far fa-calendar me-1"></i>' + post.publish_date + '</small>';
                        html += '<a href="/post/' + post.slug + '" class="btn-ghost">Read More</a>';
                        html += '</div></div></div></div>';
                    });
                } else {
                    html = '<div class="col-12 text-center py-5">';
                    html += '<i class="fas fa-folder-open" style="font-size: 4rem; color: var(--cyan);"></i>';
                    html += '<h4 class="mt-3" style="color: var(--white);">No updates found</h4>';
                    html += '</div>';
                }
                $('#postsContainer').html(html);
                $('.pagination-wrap').hide();
            },
            complete: function() {
                $('#loadingSpinner').hide();
                $('#postsContainer').show();
            }
        });
    }

    $('#searchInput').on('keypress', function(e) {
        if(e.which == 13) applyFilters();
    });
</script>
@endsection