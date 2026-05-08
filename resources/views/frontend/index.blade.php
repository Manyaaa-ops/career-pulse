@extends('layouts.main')

@section('title', 'Career Pulse - Stay Ahead. Stay Updated.')

@section('content')
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7">
                <div class="hero-content">
                    <h1>Stay Ahead.<br>Stay Updated.</h1>
                    <p>Your gateway to limitless career opportunities. Get instant access to jobs, results, admit cards, scholarships, internships and more.</p>
                    <a href="{{ route('posts') }}" class="btn-glow">
                        <i class="fas fa-rocket me-2"></i>Explore Updates
                    </a>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="search-box-glass">
                    <h4 class="fw-bold mb-3" style="color: var(--white);">Search Updates</h4>
                    <div class="input-group">
                        <input type="text" id="liveSearch" class="form-control glass-input" placeholder="Search jobs, results, admit cards...">
                        <button class="btn btn-glow" type="button"><i class="fas fa-search"></i></button>
                    </div>
                    <div id="searchResults" class="mt-3"></div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-padding">
    <div class="container">
        <h2 class="section-heading" style="color: var(--white);">Browse Categories</h2>
        <div class="row g-4">
            @foreach($categories as $category)
            <div class="col-6 col-md-4 col-lg-2">
                <div class="category-card-glass" onclick="filterByCategory({{ $category->id }})">
                    <div class="category-icon">
                        @switch($category->slug)
                            @case('latest-jobs')<i class="fas fa-briefcase"></i>@break
                            @case('admit-cards')<i class="fas fa-id-card"></i>@break
                            @case('results')<i class="fas fa-chart-line"></i>@break
                            @case('scholarships')<i class="fas fa-graduation-cap"></i>@break
                            @case('internships')<i class="fas fa-user-graduate"></i>@break
                            @case('answer-key')<i class="fas fa-key"></i>@break
                            @case('syllabus')<i class="fas fa-book-open"></i>@break
                            @default<i class="fas fa-folder"></i>
                        @endswitch
                    </div>
                    <h5>{{ $category->name }}</h5>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

@php
$homeImages = [
    'https://images.unsplash.com/photo-1522202176988-66273c2fd55f?w=500&h=300&fit=crop',
    'https://images.unsplash.com/photo-1553877522-43269d4ea984?w=500&h=300&fit=crop',
    'https://images.unsplash.com/photo-1504674900247-0877df9cc836?w=500&h=300&fit=crop',
    'https://images.unsplash.com/photo-1523240795612-9a054b0db644?w=500&h=300&fit=crop',
    'https://images.unsplash.com/photo-1516321318423-f06f85e504b3?w=500&h=300&fit=crop',
    'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=500&h=300&fit=crop'
];
@endphp

<section class="section-padding" style="background: linear-gradient(180deg, transparent, rgba(0, 168, 232, 0.03));">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-5">
            <h2 class="section-heading mb-0" style="color: var(--white);">Latest Updates</h2>
            <a href="{{ route('posts') }}" class="btn-glow">View All <i class="fas fa-arrow-right ms-2"></i></a>
        </div>
        <div class="row g-4" id="latestPosts">
            @foreach($latestPosts as $index => $post)
            <div class="col-md-6 col-lg-4">
                <div class="post-card-glass">
                    <div class="post-image-wrapper">
                        @if($post->featured_image)
                        <img src="{{ asset('uploads/' . $post->featured_image) }}" alt="{{ $post->title }}">
                        @else
                        <img src="{{ $homeImages[$index % count($homeImages)] }}" alt="{{ $post->title }}">
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
    </div>
</section>

<section class="section-padding">
    <div class="container">
        <h2 class="section-heading" style="color: var(--white);">Featured Updates</h2>
        <div class="row g-4">
            @foreach($featuredPosts as $index => $post)
            <div class="col-md-4">
                <div class="post-card-glass">
                    <div class="post-image-wrapper">
                        @php
                        $featuredImages = [
                            'https://images.unsplash.com/photo-1519389950473-47ba0277781c?w=500&h=300&fit=crop',
                            'https://images.unsplash.com/photo-1531482615713-2afd69097998?w=500&h=300&fit=crop',
                            'https://images.unsplash.com/photo-1560472354-b33ff0c44a43?w=500&h=300&fit=crop'
                        ];
                        @endphp
                        @if($post->featured_image)
                        <img src="{{ asset('uploads/' . $post->featured_image) }}" alt="{{ $post->title }}">
                        @else
                        <img src="{{ $featuredImages[$index % count($featuredImages)] }}" alt="{{ $post->title }}">
                        @endif
                    </div>
                    <div class="post-card-body">
                        <span class="post-badge">{{ $post->category->name }}</span>
                        <h5 class="post-title">{{ $post->title }}</h5>
                        <p class="post-excerpt">{{ $post->short_description }}</p>
                        <a href="{{ route('post.detail', $post->slug) }}" class="btn-ghost mt-3">Read More</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section class="section-padding">
    <div class="container">
        <div class="cta-section">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <h2 class="mb-3" style="color: var(--white);">Stay Connected</h2>
                    <p style="color: rgba(255,255,255,0.85);">Get the latest career updates delivered directly to your inbox.</p>
                </div>
                <div class="col-lg-4">
                    <form class="d-flex gap-2">
                        <input type="email" class="form-control glass-input" placeholder="Your email">
                        <button type="submit" class="btn-glow" style="background: var(--midnight); color: var(--white);">Subscribe</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')
<script>
    function filterByCategory(categoryId) {
        window.location.href = '{{ route('posts') }}?category=' + categoryId;
    }

    $('#liveSearch').on('keyup', function() {
        var query = $(this).val();
        if(query.length > 2) {
            $.ajax({
                url: '{{ route("ajax.search") }}',
                type: 'GET',
                data: { q: query },
                success: function(response) {
                    var html = '';
                    if(response.posts.length > 0) {
                        response.posts.forEach(function(post) {
                            html += '<a href="/post/' + post.slug + '" class="d-block p-3 text-decoration-none" style="background: var(--glass); border: 1px solid var(--glass-border); border-radius: 12px; margin-bottom: 6px; color: var(--white); transition: all 0.3s;">';
                            html += '<i class="fas fa-file-alt me-2" style="color: var(--cyan);"></i>' + post.title;
                            html += '</a>';
                        });
                    } else {
                        html = '<p class="text-muted p-2">No results found</p>';
                    }
                    $('#searchResults').html(html);
                }
            });
        } else {
            $('#searchResults').html('');
        }
    });
</script>
@endsection