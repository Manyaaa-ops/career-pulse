<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin - Career Pulse')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --midnight: #0c1222;
            --dark-blue: #131b2e;
            --ocean: #0066cc;
            --cyan: #00a8e8;
            --bright-cyan: #00d4ff;
            --glass: rgba(255, 255, 255, 0.05);
            --glass-border: rgba(255, 255, 255, 0.1);
            --white: #ffffff;
            --text-muted: rgba(255, 255, 255, 0.6);
        }

        * { font-family: 'Sora', sans-serif; }

        body { background: var(--dark-blue); color: var(--white); min-height: 100vh; }

        .sidebar {
            min-height: 100vh;
            background: linear-gradient(180deg, var(--midnight), var(--dark-blue));
            border-right: 1px solid var(--glass-border);
        }

        .sidebar a {
            color: var(--text-muted);
            text-decoration: none;
            padding: 18px 26px;
            display: block;
            transition: all 0.3s ease;
            border-left: 3px solid transparent;
            font-weight: 500;
        }

        .sidebar a:hover, .sidebar a.active {
            background: rgba(0, 168, 232, 0.1);
            color: var(--bright-cyan);
            border-left-color: var(--cyan);
        }

        .sidebar a i { margin-right: 12px; color: var(--cyan); }

        .main-content { padding: 28px; background: var(--dark-blue); min-height: 100vh; }

        .card-admin {
            background: var(--glass);
            backdrop-filter: blur(20px);
            border: 1px solid var(--glass-border);
            border-radius: 20px;
            overflow: hidden;
        }

        .btn-admin {
            background: linear-gradient(135deg, var(--cyan), var(--bright-cyan));
            border: none;
            padding: 14px 30px;
            border-radius: 30px;
            font-weight: 600;
            color: var(--midnight);
            transition: all 0.3s ease;
        }

        .btn-admin:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 30px rgba(0, 168, 232, 0.4);
            color: var(--midnight);
        }

        .table thead th {
            background: var(--midnight);
            color: var(--white);
            border: none;
            padding: 18px;
        }

        .table tbody tr { transition: all 0.3s ease; }
        .table tbody tr:hover { background: var(--glass); }

        .status-published {
            background: linear-gradient(135deg, #10b981, #059669);
            color: var(--white);
            padding: 6px 16px;
            border-radius: 25px;
            font-size: 0.8rem;
            font-weight: 600;
        }

        .status-draft {
            background: linear-gradient(135deg, #f59e0b, #d97706);
            color: var(--white);
            padding: 6px 16px;
            border-radius: 25px;
            font-size: 0.8rem;
            font-weight: 600;
        }

        .login-container-admin {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, var(--midnight), var(--dark-blue), var(--ocean));
        }

        .login-box-admin {
            background: var(--glass);
            backdrop-filter: blur(30px);
            border: 1px solid var(--glass-border);
            padding: 50px;
            border-radius: 30px;
            box-shadow: 0 40px 80px rgba(0, 0, 0, 0.5);
            width: 100%;
            max-width: 440px;
        }

        .login-box-admin h3 { color: var(--white); font-weight: 700; }

        .form-control-admin {
            background: rgba(255, 255, 255, 0.05);
            border: 2px solid var(--glass-border);
            border-radius: 14px;
            padding: 16px 22px;
            color: var(--white);
            transition: all 0.3s ease;
        }

        .form-control-admin:focus { border-color: var(--cyan); box-shadow: 0 0 0 4px rgba(0, 168, 232, 0.15); outline: none; color: var(--white); }

        .form-label-admin { font-weight: 600; color: var(--white); margin-bottom: 10px; }

        .form-select-admin { background: rgba(255, 255, 255, 0.05); border: 2px solid var(--glass-border); border-radius: 14px; padding: 16px; color: var(--white); }

        .note-editor { border-radius: 14px !important; border: 2px solid var(--glass-border) !important; background: rgba(255,255,255,0.05) !important; }

        .current-image-admin { max-width: 240px; border-radius: 14px; margin-top: 16px; }

        .alert-success-admin { background: linear-gradient(135deg, rgba(16, 185, 129, 0.2), rgba(5, 150, 105, 0.2)); border: 1px solid #10b981; border-radius: 14px; color: #10b981; }
        .alert-danger-admin { background: linear-gradient(135deg, rgba(239, 68, 68, 0.2), rgba(220, 38, 38, 0.2)); border: 1px solid #ef4444; border-radius: 14px; color: #ef4444; }

        .btn-info-admin { background: var(--cyan); border: none; }
        .btn-danger-admin { background: #ef4444; border: none; }
    </style>
    @yield('styles')
</head>
<body>
    @if(Request::is('admin/login'))
        @yield('content')
    @else
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 sidebar">
                <div class="text-center py-4">
                    <h4 class="text-white fw-bold" style="font-size: 1.3rem;">
                        <span style="color: var(--bright-cyan);"><i class="fas fa-bolt"></i></span> Career Pulse
                    </h4>
                    <p class="text-muted small">Admin Panel</p>
                </div>
                <nav>
                    <a href="{{ route('admin.dashboard') }}" class="{{ Request::is('admin/dashboard') ? 'active' : '' }}">
                        <i class="fas fa-home"></i> Dashboard
                    </a>
                    <a href="{{ route('admin.posts') }}" class="{{ Request::is('admin/posts*') ? 'active' : '' }}">
                        <i class="fas fa-file-alt"></i> Posts
                    </a>
                    <a href="{{ route('admin.categories') }}" class="{{ Request::is('admin/categories*') ? 'active' : '' }}">
                        <i class="fas fa-folder"></i> Categories
                    </a>
                    <a href="{{ route('home') }}" target="_blank">
                        <i class="fas fa-external-link-alt"></i> View Site
                    </a>
                    <a href="{{ route('admin.logout') }}">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </a>
                </nav>
            </div>
            <div class="col-md-10 main-content">
                @if(Session::has('success'))
                <div class="alert alert-success-admin alert-dismissible fade show" role="alert">
                    <i class="fas fa-check-circle me-2"></i>{{ Session::get('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" style="filter: invert(1);"></button>
                </div>
                @endif
                @if(Session::has('error'))
                <div class="alert alert-danger-admin alert-dismissible fade show" role="alert">
                    <i class="fas fa-exclamation-circle me-2"></i>{{ Session::get('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" style="filter: invert(1);"></button>
                </div>
                @endif
                @yield('content')
            </div>
        </div>
    </div>
    @endif

    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    @yield('scripts')
</body>
</html>