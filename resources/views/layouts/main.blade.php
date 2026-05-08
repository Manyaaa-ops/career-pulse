<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Career Pulse - Stay Ahead. Stay Updated.')</title>
    <meta name="description" content="Career Pulse - Your trusted source for latest jobs, admit cards, results, scholarships, internships and more.">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@300;400;500;600;700;800&family=Playfair+Display:wght@400;500;600;700&display=swap" rel="stylesheet">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.2/dist/gsap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.2/dist/ScrollTrigger.min.js"></script>

    <style>
        :root {
            --midnight: #0c1222;
            --dark-blue: #131b2e;
            --ocean: #0066cc;
            --cyan: #00a8e8;
            --bright-cyan: #00d4ff;
            --light-cyan: #8ecae6;
            --glass: rgba(255, 255, 255, 0.03);
            --glass-border: rgba(255, 255, 255, 0.08);
            --white: #ffffff;
            --text-light: rgba(255, 255, 255, 0.7);
            --text-muted: rgba(255, 255, 255, 0.5);
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }
        
        body {
            font-family: 'Sora', sans-serif;
            background: var(--midnight);
            color: var(--white);
            overflow-x: hidden;
        }

        h1, h2, h3, h4, h5, h6 { font-weight: 700; letter-spacing: -0.5px; }

        /* ==================== THREE.JS CANVAS ==================== */
        #hero-canvas {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 0;
            pointer-events: none;
        }

        .content-wrapper {
            position: relative;
            z-index: 1;
        }

        /* ==================== FLOATING ORBS ==================== */
        .orb {
            position: fixed;
            border-radius: 50%;
            filter: blur(80px);
            pointer-events: none;
            z-index: 0;
        }

        .orb-1 {
            width: 500px;
            height: 500px;
            background: radial-gradient(circle, rgba(0, 168, 232, 0.3) 0%, transparent 70%);
            top: -10%;
            right: -10%;
            animation: float-orb 20s ease-in-out infinite;
        }

        .orb-2 {
            width: 400px;
            height: 400px;
            background: radial-gradient(circle, rgba(0, 102, 204, 0.25) 0%, transparent 70%);
            bottom: 20%;
            left: -15%;
            animation: float-orb 25s ease-in-out infinite reverse;
        }

        .orb-3 {
            width: 300px;
            height: 300px;
            background: radial-gradient(circle, rgba(0, 212, 255, 0.2) 0%, transparent 70%);
            top: 40%;
            left: 30%;
            animation: float-orb 18s ease-in-out infinite;
        }

        @keyframes float-orb {
            0%, 100% { transform: translate(0, 0) scale(1); }
            33% { transform: translate(30px, -30px) scale(1.05); }
            66% { transform: translate(-20px, 20px) scale(0.95); }
        }

        /* ==================== BACKGROUND ELEMENTS ==================== */
        .bg-floating {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: 0;
            overflow: hidden;
        }

        .floating-icon {
            position: absolute;
            font-size: 2.5rem;
            opacity: 0.08;
            animation: float-float 15s ease-in-out infinite;
        }

        .floating-icon:nth-child(1) { top: 10%; left: 5%; animation-delay: 0s; color: var(--cyan); }
        .floating-icon:nth-child(2) { top: 20%; right: 10%; animation-delay: 2s; color: var(--bright-cyan); }
        .floating-icon:nth-child(3) { bottom: 30%; left: 8%; animation-delay: 4s; color: var(--ocean); }
        .floating-icon:nth-child(4) { bottom: 15%; right: 15%; animation-delay: 1s; color: var(--cyan); }
        .floating-icon:nth-child(5) { top: 50%; left: 3%; animation-delay: 3s; color: var(--bright-cyan); }
        .floating-icon:nth-child(6) { top: 35%; right: 25%; animation-delay: 5s; color: var(--ocean); }

        @keyframes float-float {
            0%, 100% { transform: translateY(0) rotate(0deg); opacity: 0.08; }
            25% { transform: translateY(-20px) rotate(5deg); opacity: 0.12; }
            50% { transform: translateY(10px) rotate(-3deg); opacity: 0.06; }
            75% { transform: translateY(-15px) rotate(3deg); opacity: 0.1; }
        }

        /* Grid pattern */
        .grid-pattern {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: 
                linear-gradient(rgba(0, 168, 232, 0.03) 1px, transparent 1px),
                linear-gradient(90deg, rgba(0, 168, 232, 0.03) 1px, transparent 1px);
            background-size: 60px 60px;
            z-index: 0;
        }

        /* ==================== NAVBAR ==================== */
        .navbar-custom {
            background: rgba(12, 18, 34, 0.8) !important;
            backdrop-filter: blur(30px);
            -webkit-backdrop-filter: blur(30px);
            border-bottom: 1px solid var(--glass-border);
            padding: 20px 0;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            transition: all 0.4s ease;
        }

        .navbar-custom.scrolled {
            padding: 12px 0;
            background: rgba(12, 18, 34, 0.95) !important;
        }

        .navbar-brand-custom {
            font-weight: 800;
            font-size: 1.6rem;
            color: var(--white) !important;
            letter-spacing: -1px;
        }

        .navbar-brand-custom span {
            background: linear-gradient(135deg, var(--cyan), var(--bright-cyan));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .nav-link-custom {
            color: var(--text-light) !important;
            font-weight: 500;
            padding: 10px 22px !important;
            transition: all 0.3s ease;
            position: relative;
        }

        .nav-link-custom::after {
            content: '';
            position: absolute;
            bottom: 4px;
            left: 22px;
            right: 22px;
            height: 2px;
            background: linear-gradient(90deg, var(--cyan), var(--bright-cyan));
            transform: scaleX(0);
            transition: transform 0.3s ease;
        }

        .nav-link-custom:hover { color: var(--white) !important; }
        .nav-link-custom:hover::after { transform: scaleX(1); }

        .dropdown-custom {
            background: rgba(19, 27, 46, 0.95);
            backdrop-filter: blur(20px);
            border: 1px solid var(--glass-border);
            border-radius: 16px;
            padding: 12px 0;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.5);
        }

        .dropdown-item-custom {
            color: var(--text-light);
            padding: 12px 24px;
            transition: all 0.3s ease;
        }

        .dropdown-item-custom:hover {
            background: linear-gradient(90deg, rgba(0, 168, 232, 0.2), transparent);
            color: var(--bright-cyan);
            padding-left: 32px;
        }

        .btn-glow {
            background: linear-gradient(135deg, var(--cyan), var(--bright-cyan));
            border: none;
            padding: 12px 30px;
            border-radius: 50px;
            font-weight: 600;
            color: var(--midnight);
            transition: all 0.3s ease;
            box-shadow: 0 5px 25px rgba(0, 168, 232, 0.3);
        }

        .btn-glow:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 40px rgba(0, 168, 232, 0.5);
            color: var(--midnight);
        }

        /* ==================== HERO SECTION ==================== */
        .hero-section {
            min-height: 100vh;
            display: flex;
            align-items: center;
            padding: 150px 0 100px;
            position: relative;
            background: linear-gradient(180deg, transparent 0%, rgba(12, 18, 34, 0.5) 100%);
        }

        .hero-content h1 {
            font-size: clamp(3rem, 7vw, 5rem);
            font-weight: 800;
            line-height: 1.1;
            margin-bottom: 25px;
            background: linear-gradient(135deg, var(--white) 0%, var(--light-cyan) 50%, var(--white) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-size: 200% auto;
            animation: shimmer 4s linear infinite;
        }

        @keyframes shimmer {
            0% { background-position: 0% center; }
            100% { background-position: 200% center; }
        }

        .hero-content p {
            color: var(--text-light);
            font-size: 1.25rem;
            margin-bottom: 40px;
            max-width: 500px;
            line-height: 1.8;
        }

        .search-box-glass {
            background: var(--glass);
            backdrop-filter: blur(20px);
            border: 1px solid var(--glass-border);
            border-radius: 24px;
            padding: 30px;
        }

        .glass-input {
            background: rgba(255, 255, 255, 0.05);
            border: 2px solid var(--glass-border);
            border-radius: 14px;
            padding: 16px 22px;
            color: var(--white);
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .glass-input::placeholder { color: var(--text-muted); }

        .glass-input:focus {
            border-color: var(--cyan);
            background: rgba(255, 255, 255, 0.08);
            box-shadow: 0 0 0 4px rgba(0, 168, 232, 0.15);
            outline: none;
            color: var(--white);
        }

        /* ==================== SECTIONS ==================== */
        .section-padding { padding: 100px 0; }

        .section-heading {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 50px;
            position: relative;
            display: inline-block;
        }

        .section-heading::after {
            content: '';
            position: absolute;
            bottom: -12px;
            left: 0;
            width: 60px;
            height: 4px;
            background: linear-gradient(90deg, var(--cyan), var(--bright-cyan));
            border-radius: 2px;
        }

        /* ==================== CATEGORY CARDS ==================== */
        .category-card-glass {
            background: var(--glass);
            backdrop-filter: blur(20px);
            border: 1px solid var(--glass-border);
            border-radius: 24px;
            padding: 40px 25px;
            text-align: center;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            cursor: pointer;
            height: 100%;
            position: relative;
            overflow: hidden;
        }

        .category-card-glass::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(0, 168, 232, 0.1), transparent);
            opacity: 0;
            transition: opacity 0.4s ease;
        }

        .category-card-glass:hover {
            border-color: var(--cyan);
            transform: translateY(-15px) scale(1.02);
            box-shadow: 0 30px 60px rgba(0, 168, 232, 0.2);
        }

        .category-card-glass:hover::before { opacity: 1; }

        .category-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, rgba(0, 168, 232, 0.2), rgba(0, 212, 255, 0.1));
            border: 1px solid var(--glass-border);
            border-radius: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.8rem;
            color: var(--cyan);
            margin: 0 auto 25px;
            transition: all 0.3s ease;
        }

        .category-card-glass:hover .category-icon {
            transform: rotate(15deg) scale(1.1);
            background: linear-gradient(135deg, var(--cyan), var(--bright-cyan));
            color: var(--midnight);
        }

        .category-card-glass h5 {
            color: var(--white);
            font-weight: 600;
            font-size: 1.1rem;
        }

        /* ==================== POST CARDS ==================== */
        .post-card-glass {
            background: var(--glass);
            backdrop-filter: blur(20px);
            border: 1px solid var(--glass-border);
            border-radius: 28px;
            overflow: hidden;
            transition: all 0.4s ease;
            height: 100%;
            position: relative;
        }

        .post-card-glass::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, var(--cyan), var(--bright-cyan));
            transform: scaleX(0);
            transition: transform 0.4s ease;
        }

        .post-card-glass:hover {
            border-color: var(--cyan);
            box-shadow: 0 35px 70px rgba(0, 168, 232, 0.15);
            transform: translateY(-15px);
        }

        .post-card-glass:hover::after { transform: scaleX(1); }

        .post-image-wrapper {
            height: 230px;
            overflow: hidden;
            position: relative;
        }

        .post-image-wrapper::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 50%;
            background: linear-gradient(to top, var(--midnight), transparent);
        }

        .post-image-wrapper img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.6s ease;
        }

        .post-card-glass:hover .post-image-wrapper img { transform: scale(1.1); }

        .post-card-body {
            padding: 28px;
        }

        .post-badge {
            background: linear-gradient(135deg, var(--cyan), var(--bright-cyan));
            color: var(--midnight);
            padding: 7px 18px;
            border-radius: 25px;
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .post-title {
            color: var(--white);
            font-weight: 600;
            font-size: 1.15rem;
            margin: 18px 0 14px;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            transition: color 0.3s ease;
            position: relative;
        }

        .post-title::before {
            content: '';
            position: absolute;
            left: 0;
            top: 50%;
            transform: translateY(-50%);
            width: 0;
            height: 2px;
            background: linear-gradient(90deg, var(--cyan), var(--bright-cyan));
            transition: width 0.4s ease;
        }

        .post-card-glass:hover .post-title {
            padding-left: 15px;
            color: var(--bright-cyan);
        }

        .post-card-glass:hover .post-title::before {
            width: 8px;
        }

        .post-card-glass:hover .post-title { color: var(--bright-cyan); }

        .post-excerpt {
            color: var(--text-light);
            font-size: 0.95rem;
            line-height: 1.7;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .btn-ghost {
            background: transparent;
            border: 2px solid var(--cyan);
            color: var(--cyan);
            padding: 12px 28px;
            border-radius: 30px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .btn-ghost:hover {
            background: linear-gradient(135deg, var(--cyan), var(--bright-cyan));
            color: var(--midnight);
            border-color: transparent;
            transform: translateX(5px);
        }

        /* ==================== FOOTER ==================== */
        .footer-custom {
            background: linear-gradient(180deg, transparent, rgba(0, 168, 232, 0.05));
            border-top: 1px solid var(--glass-border);
            padding: 80px 0 30px;
            margin-top: 80px;
        }

        .footer-custom h5 {
            color: var(--white);
            font-weight: 700;
            margin-bottom: 25px;
            font-size: 1.3rem;
        }

        .footer-custom a {
            color: var(--text-light);
            text-decoration: none;
            transition: all 0.3s ease;
            display: block;
            padding: 8px 0;
        }

        .footer-custom a:hover {
            color: var(--bright-cyan);
            padding-left: 10px;
        }

        /* ==================== UTILITIES ==================== */
        .text-gradient {
            background: linear-gradient(135deg, var(--cyan), var(--bright-cyan));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .loading-spinner { display: none; text-align: center; padding: 60px; }
        .loading-spinner i { font-size: 3rem; color: var(--cyan); animation: spin 1s linear infinite; }
        @keyframes spin { 100% { transform: rotate(360deg); } }

        .pagination-custom .page-link {
            background: var(--glass);
            border: 1px solid var(--glass-border);
            color: var(--text-light);
            padding: 12px 18px;
            border-radius: 12px;
            margin: 0 4px;
            transition: all 0.3s ease;
        }

        .pagination-custom .page-link:hover {
            background: var(--cyan);
            border-color: var(--cyan);
            color: var(--midnight);
        }

        .pagination-custom .page-item.active .page-link {
            background: linear-gradient(135deg, var(--cyan), var(--bright-cyan));
            border-color: var(--cyan);
            color: var(--midnight);
        }

        /* CTA Section */
        .cta-section {
            background: linear-gradient(135deg, var(--ocean), var(--cyan));
            border-radius: 30px;
            padding: 60px;
            position: relative;
            overflow: hidden;
        }

        .cta-section::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -20%;
            width: 300px;
            height: 300px;
            background: radial-gradient(circle, rgba(255,255,255,0.2) 0%, transparent 70%);
            animation: pulse-cta 4s ease-in-out infinite;
        }

        @keyframes pulse-cta {
            0%, 100% { transform: scale(1); opacity: 0.5; }
            50% { transform: scale(1.2); opacity: 0.8; }
        }

        @media (max-width: 991px) {
            .hero-content h1 { font-size: 2.5rem; }
            .bg-floating { display: none; }
        }

        /* ==================== PREMIUM GLOW EFFECTS ==================== */
        .glow-line {
            position: relative;
        }

        .glow-line::after {
            content: '';
            position: absolute;
            bottom: -8px;
            left: 0;
            width: 100%;
            height: 2px;
            background: linear-gradient(90deg, transparent, var(--cyan), var(--bright-cyan), transparent);
            background-size: 200% 100%;
            animation: glow-flow 3s linear infinite;
        }

        @keyframes glow-flow {
            0% { background-position: -200% 0; }
            100% { background-position: 200% 0; }
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            background: rgba(0, 168, 232, 0.1);
            border: 1px solid rgba(0, 168, 232, 0.3);
            padding: 10px 20px;
            border-radius: 50px;
            font-size: 0.85rem;
            color: var(--bright-cyan);
            margin-bottom: 25px;
            animation: badge-pulse 2s ease-in-out infinite;
        }

        @keyframes badge-pulse {
            0%, 100% { box-shadow: 0 0 0 0 rgba(0, 168, 232, 0.4); }
            50% { box-shadow: 0 0 20px 5px rgba(0, 168, 232, 0.2); }
        }

        .scroll-indicator {
            position: absolute;
            bottom: 40px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 10px;
            color: var(--text-muted);
            animation: bounce-soft 2s ease-in-out infinite;
        }

        @keyframes bounce-soft {
            0%, 100% { transform: translateX(-50%) translateY(0); }
            50% { transform: translateX(-50%) translateY(-10px); }
        }

        .scroll-indicator .mouse {
            width: 26px;
            height: 40px;
            border: 2px solid var(--cyan);
            border-radius: 20px;
            position: relative;
        }

        .scroll-indicator .mouse::after {
            content: '';
            position: absolute;
            top: 8px;
            left: 50%;
            transform: translateX(-50%);
            width: 4px;
            height: 8px;
            background: var(--cyan);
            border-radius: 2px;
            animation: scroll-dot 1.5s ease-in-out infinite;
        }

        @keyframes scroll-dot {
            0%, 100% { opacity: 1; transform: translateX(-50%) translateY(0); }
            50% { opacity: 0.3; transform: translateX(-50%) translateY(12px); }
        }

        .card-shine {
            position: relative;
            overflow: hidden;
        }

        .card-shine::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.05), transparent);
            transition: left 0.6s ease;
            z-index: 1;
        }

        .post-card-glass:hover .card-shine::before {
            left: 100%;
        }

        .stats-row {
            display: flex;
            gap: 30px;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid var(--glass-border);
        }

        .stat-item {
            text-align: center;
        }

        .stat-number {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--cyan);
        }

        .stat-label {
            font-size: 0.8rem;
            color: var(--text-muted);
        }

        .search-icon-btn {
            background: linear-gradient(135deg, var(--cyan), var(--bright-cyan));
            border: none;
            width: 56px;
            height: 56px;
            border-radius: 16px;
            color: var(--midnight);
            font-size: 1.2rem;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 5px 20px rgba(0, 168, 232, 0.3);
        }

        .search-icon-btn:hover {
            transform: scale(1.1) rotate(5deg);
            box-shadow: 0 10px 35px rgba(0, 168, 232, 0.5);
        }

        .featured-badge {
            position: absolute;
            top: 20px;
            right: 20px;
            background: linear-gradient(135deg, #ff6b6b, #ffa500);
            color: white;
            padding: 6px 14px;
            border-radius: 20px;
            font-size: 0.7rem;
            font-weight: 700;
            text-transform: uppercase;
            z-index: 2;
        }
    </style>
    @yield('styles')
</head>
<body>
    <!-- Background Effects -->
    <div class="orb orb-1"></div>
    <div class="orb orb-2"></div>
    <div class="orb orb-3"></div>
    <div class="grid-pattern"></div>
    
    <div class="bg-floating">
        <i class="fas fa-envelope floating-icon"></i>
        <i class="fas fa-paper-plane floating-icon"></i>
        <i class="fas fa-briefcase floating-icon"></i>
        <i class="fas fa-graduation-cap floating-icon"></i>
        <i class="fas fa-file-alt floating-icon"></i>
        <i class="fas fa-search floating-icon"></i>
    </div>

    <canvas id="hero-canvas"></canvas>

    <!-- Main Content -->
    <div class="content-wrapper">
        <nav class="navbar navbar-expand-lg navbar-custom" id="mainNav">
            <div class="container">
                <a class="navbar-brand-custom" href="{{ route('home') }}">
                    <span><i class="fas fa-bolt"></i></span> Career Pulse
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" style="border: 1px solid var(--glass-border);">
                    <span class="navbar-toggler-icon" style="background: var(--white);"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link-custom" href="{{ route('home') }}">Home</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link-custom dropdown-toggle" href="#" data-bs-toggle="dropdown">Categories</a>
                            <ul class="dropdown-menu dropdown-custom">
                                @php $categories = \App\Models\Category::all(); @endphp
                                @foreach($categories as $category)
                                <li><a class="dropdown-item-custom" href="{{ route('posts') }}?category={{ $category->id }}">{{ $category->name }}</a></li>
                                @endforeach
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link-custom dropdown-toggle" href="#" data-bs-toggle="dropdown">Updates</a>
                            <ul class="dropdown-menu dropdown-custom">
                                <li><a class="dropdown-item-custom" href="{{ route('posts') }}">All Updates</a></li>
                                <li><a class="dropdown-item-custom" href="{{ route('posts') }}?date=newest">Latest First</a></li>
                                <li><a class="dropdown-item-custom" href="{{ route('posts') }}?date=oldest">Oldest First</a></li>
                            </ul>
                        </li>
                        <li class="nav-item"><a class="nav-link-custom" href="{{ route('posts') }}">All Posts</a></li>
                        <li class="nav-item ms-2 mt-2 mt-lg-0">
                            <a class="btn-glow" href="{{ route('admin.login') }}">Admin</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')

        <footer class="footer-custom">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 mb-4">
                        <h5><span class="text-gradient"><i class="fas fa-bolt me-2"></i></span>Career Pulse</h5>
                        <p style="color: var(--text-light); line-height: 1.9; max-width: 280px;">Your trusted gateway to career opportunities. Stay ahead with latest updates on jobs, admissions, and more.</p>
                    </div>
                    <div class="col-lg-4 mb-4">
                        <h5>Quick Links</h5>
                        <a href="{{ route('home') }}">Home</a>
                        <a href="{{ route('posts') }}">All Updates</a>
                        <a href="{{ route('admin.login') }}">Admin Panel</a>
                    </div>
                    <div class="col-lg-4 mb-4">
                        <h5>Contact</h5>
                        <p style="color: var(--text-light);"><i class="fas fa-envelope me-2 text-gradient"></i>admin@careerpulse.com</p>
                        <p style="color: var(--text-light);"><i class="fas fa-map-marker-alt me-2 text-gradient"></i>India</p>
                    </div>
                </div>
                <div class="text-center pt-4" style="border-top: 1px solid var(--glass-border);">
                    <p class="mb-0" style="color: var(--text-muted);">&copy; {{ date('Y') }} Career Pulse. All rights reserved.</p>
                </div>
            </div>
        </footer>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Navbar scroll effect
        window.addEventListener('scroll', () => {
            const nav = document.getElementById('mainNav');
            if (window.scrollY > 50) {
                nav.classList.add('scrolled');
            } else {
                nav.classList.remove('scrolled');
            }
        });

        // Three.js Particle System
        const canvas = document.getElementById('hero-canvas');
        const scene = new THREE.Scene();
        const camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
        const renderer = new THREE.WebGLRenderer({ canvas, alpha: true, antialias: true });
        renderer.setSize(window.innerWidth, window.innerHeight);
        renderer.setPixelRatio(Math.min(window.devicePixelRatio, 2));

        // Create particles
        const particlesGeometry = new THREE.BufferGeometry();
        const particlesCount = 500;
        const posArray = new Float32Array(particlesCount * 3);

        for(let i = 0; i < particlesCount * 3; i++) {
            posArray[i] = (Math.random() - 0.5) * 10;
        }

        particlesGeometry.setAttribute('position', new THREE.BufferAttribute(posArray, 3));

        const particlesMaterial = new THREE.PointsMaterial({
            size: 0.02,
            color: 0x00a8e8,
            transparent: true,
            opacity: 0.8
        });

        const particlesMesh = new THREE.Points(particlesGeometry, particlesMaterial);
        scene.add(particlesMesh);
        camera.position.z = 3;

        let mouseX = 0, mouseY = 0;
        document.addEventListener('mousemove', (e) => {
            mouseX = e.clientX / window.innerWidth - 0.5;
            mouseY = e.clientY / window.innerHeight - 0.5;
        });

        function animateParticles() {
            particlesMesh.rotation.x += 0.0003;
            particlesMesh.rotation.y += 0.0003;
            
            particlesMesh.rotation.x += mouseY * 0.05;
            particlesMesh.rotation.y += mouseX * 0.05;

            renderer.render(scene, camera);
            requestAnimationFrame(animateParticles);
        }
        animateParticles();

        window.addEventListener('resize', () => {
            camera.aspect = window.innerWidth / window.innerHeight;
            camera.updateProjectionMatrix();
            renderer.setSize(window.innerWidth, window.innerHeight);
        });

        // GSAP Animations
        gsap.registerPlugin(ScrollTrigger);
        
        gsap.utils.toArray('.post-card-glass').forEach((card, i) => {
            gsap.from(card, {
                scrollTrigger: { trigger: card, start: 'top 85%' },
                y: 60,
                opacity: 0,
                duration: 0.8,
                delay: i * 0.1,
                ease: 'power3.out'
            });
        });

        gsap.utils.toArray('.category-card-glass').forEach((card, i) => {
            gsap.from(card, {
                scrollTrigger: { trigger: card, start: 'top 90%' },
                y: 40,
                opacity: 0,
                duration: 0.6,
                delay: i * 0.1,
                ease: 'back.out(1.7)'
            });
        });
    </script>
    @yield('scripts')
</body>
</html>