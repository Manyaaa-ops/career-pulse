@extends('layouts.main')

@section('title', $post->title . ' - Career Pulse')

@section('styles')
<style>
    .detail-img { width: 100%; height: 520px; object-fit: cover; border-radius: 30px; box-shadow: 0 35px 70px rgba(0, 0, 0, 0.4); }
    .post-content-custom { font-size: 1.1rem; line-height: 1.95; color: var(--text-light); }
    .post-content-custom p { margin-bottom: 1.5rem; }
    .post-content-custom h1, .post-content-custom h2, .post-content-custom h3 { color: var(--white); font-weight: 700; margin-top: 2rem; margin-bottom: 1rem; }
    .post-content-custom ul, .post-content-custom ol { background: var(--glass); border: 1px solid var(--glass-border); padding: 22px 32px; border-radius: 14px; margin: 1.5rem 0; }
    .post-content-custom li { margin-bottom: 12px; }
    .meta-custom { color: var(--text-light); font-size: 1rem; }
    .related-card-glass { border-radius: 18px; overflow: hidden; transition: all 0.3s ease; background: var(--glass); border: 1px solid var(--glass-border); }
    .related-card-glass:hover { transform: translateY(-10px); border-color: var(--cyan); box-shadow: 0 25px 50px rgba(0, 168, 232, 0.15); }
    .related-card-glass img { height: 140px; object-fit: cover; }
    .widget-glass { background: var(--glass); backdrop-filter: blur(20px); border: 1px solid var(--glass-border); border-radius: 22px; padding: 26px; }
    .widget-glass .badge { transition: all 0.3s ease; }
    .widget-glass .badge:hover { transform: scale(1.08); }
</style>
@endsection

@section('content')
<section class="section-padding" style="padding-top: 140px;">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                @php
                $detailImages = [
                    'https://images.unsplash.com/photo-1522202176988-66273c2fd55f?w=800&h=520&fit=crop',
                    'https://images.unsplash.com/photo-1553877522-43269d4ea984?w=800&h=520&fit=crop',
                    'https://images.unsplash.com/photo-1504674900247-0877df9cc836?w=800&h=520&fit=crop',
                    'https://images.unsplash.com/photo-1523240795612-9a054b0db644?w=800&h=520&fit=crop',
                    'https://images.unsplash.com/photo-1516321318423-f06f85e504b3?w=800&h=520&fit=crop',
                    'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=800&h=520&fit=crop',
                    'https://images.unsplash.com/photo-1519389950473-47ba0277781c?w=800&h=520&fit=crop',
                    'https://images.unsplash.com/photo-1531482615713-2afd69097998?w=800&h=520&fit=crop'
                ];
                $postIndex = $post->id % count($detailImages);
                @endphp
                <img src="{{ $post->featured_image ? asset('uploads/' . $post->featured_image) : $detailImages[$postIndex] }}" class="detail-img mb-4" alt="{{ $post->title }}">

                <span class="post-badge mb-3 d-inline-block">{{ $post->category->name }}</span>

                <h1 class="fw-bold mb-4" style="color: var(--white); font-size: 2.4rem; line-height: 1.3;">{{ $post->title }}</h1>

                <div class="meta-custom mb-4 d-flex gap-4">
                    <span><i class="fas fa-calendar me-2" style="color: var(--cyan);"></i>{{ $post->publish_date->format('d M Y') }}</span>
                    <span><i class="fas fa-folder me-2" style="color: var(--cyan);"></i>{{ $post->category->name }}</span>
                </div>

                <div class="post-content-custom">
                    {!! $post->content !!}
                </div>

                <div class="mt-5 pt-4" style="border-top: 1px solid var(--glass-border);">
                    <a href="{{ route('posts') }}" class="btn-glow">
                        <i class="fas fa-arrow-left me-2"></i>Back to Updates
                    </a>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card mb-4 widget-glass">
                    <div class="card-body">
                        <h5 class="card-title mb-3" style="color: var(--white); font-weight: 700;">Categories</h5>
                        <div class="d-flex flex-wrap gap-2">
                            @foreach(\App\Models\Category::all() as $category)
                            <a href="{{ route('posts') }}?category={{ $category->id }}" class="badge text-decoration-none" style="background: linear-gradient(135deg, var(--cyan), var(--bright-cyan)); color: var(--midnight); padding: 10px 16px; border-radius: 25px; font-weight: 600;">{{ $category->name }}</a>
                            @endforeach
                        </div>
                    </div>
                </div>

                @if($relatedPosts->count() > 0)
                <div class="card widget-glass">
                    <div class="card-body">
                        <h5 class="card-title mb-4" style="color: var(--white); font-weight: 700;">Related Updates</h5>
                        @php
                        $relatedImages = [
                            'https://images.unsplash.com/photo-1522202176988-66273c2fd55f?w=300&h=150&fit=crop',
                            'https://images.unsplash.com/photo-1553877522-43269d4ea984?w=300&h=150&fit=crop',
                            'https://images.unsplash.com/photo-1504674900247-0877df9cc836?w=300&h=150&fit=crop'
                        ];
                        @endphp
                        @foreach($relatedPosts as $index => $related)
                        <div class="mb-3">
                            <a href="{{ route('post.detail', $related->slug) }}" class="text-decoration-none">
                                <div class="related-card-glass card">
                                    <img src="{{ $related->featured_image ? asset('uploads/' . $related->featured_image) : $relatedImages[$index % count($relatedImages)] }}" alt="{{ $related->title }}">
                                    <div class="card-body">
                                        <h6 class="mb-1" style="color: var(--white);">{{ $related->title }}</h6>
                                        <small style="color: var(--text-muted);">{{ $related->publish_date->format('d M Y') }}</small>
                                    </div>
                                </div>
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection