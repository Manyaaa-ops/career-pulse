# Career Pulse - Career Update Portal

A full-stack career update portal built with Laravel 12, featuring a premium dark theme with glassmorphism UI, Three.js particle effects, and GSAP scroll animations.

![Career Pulse](https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?w=1200)

---

## ✨ Features

### Frontend
- 🏠 **Homepage** - Hero section with animated search, category cards, featured posts
- 📄 **Blog Listing** - Filter by category, sort by date, AJAX search
- 📖 **Post Detail** - Rich content view with related posts
- 🔍 **AJAX Search** - Real-time search with instant results
- 📱 **Fully Responsive** - Works on all devices

### Admin Panel
- 📊 **Dashboard** - Overview statistics
- 📝 **Post Management** - Create, edit, delete posts
- 🗂️ **Category Management** - Add, edit, delete categories
- 🔒 **Secure Login** - Admin authentication

### UI/UX
- 🌙 **Dark Theme** - Midnight blue with cyan accents
- ✨ **Glassmorphism** - Frosted glass card effects
- 🎨 **Three.js Particles** - Animated floating particles
- 📜 **GSAP Animations** - Smooth scroll-triggered animations
- 💫 **Glow Effects** - Neon cyan gradients and borders

---

## 🛠️ Tech Stack

| Category | Technology |
|----------|------------|
| Backend | Laravel 12 (PHP 8.2) |
| Database | MySQL / SQLite |
| Frontend | Bootstrap 5, jQuery, AJAX |
| Rich Text | Summernote Editor |
| Animations | Three.js, GSAP, CSS3 |
| Fonts | Sora (Google Fonts) |

---

## 🚀 Setup Steps

### Prerequisites
- PHP 8.2+
- Composer
- Node.js (for npm)
- MySQL or SQLite

### Installation

```bash
# Clone the repository
git clone https://github.com/Manyaaa-ops/career-pulse.git
cd career-pulse

# Install dependencies
composer install
npm install

# Copy environment file
cp .env.example .env

# Generate application key
php artisan key:generate

# Configure database in .env
# For SQLite:
# DB_CONNECTION=sqlite
# DB_DATABASE=/full/path/to/database.sqlite

# Run migrations
php artisan migrate

# Seed sample data
php artisan db:seed

# Start development server
php artisan serve
```

### Default Login
- **URL:** http://127.0.0.1:8000/admin
- **Email:** admin@careerpulse.com
- **Password:** password123

---

## 📁 Project Structure

```
career-pulse/
├── app/Http/Controllers/    # Controllers
│   ├── AdminController.php
│   ├── FrontendController.php
│   └── PostController.php
├── app/Models/              # Eloquent Models
│   ├── Category.php
│   └── Post.php
├── database/
│   ├── migrations/         # Database migrations
│   ├── seeders/            # Sample data seeders
│   └── data.sql            # MySQL export
├── resources/views/
│   ├── layouts/            # Main & admin layouts
│   ├── frontend/           # Public pages
│   └── admin/              # Admin panel
├── routes/web.php           # Application routes
└── .env.example            # Environment config
```

---

## 📄 Available Routes

| Route | Description |
|-------|-------------|
| `/` | Homepage |
| `/posts` | All posts with filters |
| `/post/{slug}` | Single post detail |
| `/admin` | Admin dashboard |
| `/admin/login` | Admin login |

---

## 🌐 Deployment

### Option 1: InfinityFree
1. Upload files via FTP (FileZilla)
2. Create MySQL database in panel
3. Import `database/data.sql`
4. Update `.env` with credentials

### Option 2: Render.com
1. Connect GitHub repo to Render
2. Add MySQL database (Render offers free PostgreSQL)
3. Set environment variables
4. Deploy automatically

### Option 3: 000webhost
1. Upload via File Manager
2. Create database, import SQL
3. Configure .env file

---

## 📊 Database Schema

### Categories Table
- id, name, slug, timestamps

### Posts Table
- id, category_id, title, slug, excerpt, content
- image, author, views, is_featured, status
- timestamps

---

## 🎨 Color Palette

| Color | Hex | Usage |
|-------|-----|-------|
| Midnight | #0c1222 | Background |
| Dark Blue | #131b2e | Cards |
| Ocean | #0066cc | Accents |
| Cyan | #00a8e8 | Primary |
| Bright Cyan | #00d4ff | Highlights |
| White | #ffffff | Text |

---

## 📝 License

This project is open source and available under the [MIT License](LICENSE).

---

## 👤 Author

**Created by:** Manya Dixit

**GitHub:** https://github.com/Manyaaa-ops/career-pulse

---

## 🙏 Acknowledgments

- [Laravel](https://laravel.com) - PHP framework
- [Three.js](https://threejs.org) - 3D animations
- [GSAP](https://greensock.com/gsap/) - Animation platform
- [Unsplash](https://unsplash.com) - Sample images