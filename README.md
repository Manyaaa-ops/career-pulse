# Career Pulse

A full-stack Blog / Career Update Portal built with Laravel 12.

## Features

- **Public Frontend**
  - Homepage with hero banner, search, categories, latest posts
  - Blog listing with filters (category, date, search)
  - Blog detail page with related posts

- **Admin Panel**
  - Dashboard with statistics
  - Post management (Create, Edit, Delete)
  - Category management
  - Rich text editor (Summernote)

- **AJAX Features**
  - Live search
  - Category filtering
  - Date sorting

## Tech Stack

- Laravel 12
- PHP 8.2+
- MySQL
- Bootstrap 5
- jQuery
- Summernote Editor
- AJAX

## Installation

1. **Clone the repository**
   ```bash
   git clone <repository-url>
   cd career-pulse
   ```

2. **Install dependencies**
   ```bash
   composer install
   npm install
   ```

3. **Configure environment**
   ```bash
   cp .env.example .env
   ```

4. **Update .env file**
   ```
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=career_pulse
   DB_USERNAME=root
   DB_PASSWORD=
   ```

5. **Generate key**
   ```bash
   php artisan key:generate
   ```

6. **Run migrations**
   ```bash
   php artisan migrate
   ```

7. **Seed database**
   ```bash
   php artisan db:seed
   ```

8. **Build assets**
   ```bash
   npm run dev
   ```

9. **Start server**
   ```bash
   php artisan serve
   ```

## Admin Credentials

- **Email:** admin@careerpulse.com
- **Password:** password123

## Routes

| Route | Description |
|-------|-------------|
| `/` | Homepage |
| `/posts` | All Posts |
| `/post/{slug}` | Post Detail |
| `/admin/login` | Admin Login |
| `/admin/dashboard` | Admin Dashboard |
| `/admin/posts` | Manage Posts |
| `/admin/categories` | Manage Categories |

## AJAX Endpoints

| Endpoint | Description |
|----------|-------------|
| `/ajax/search?q=` | Search posts |
| `/ajax/filter?category_id=&date=` | Filter posts |

## Deployment

### On Render
1. Connect your GitHub repository
2. Set environment variables
3. Use build command: `php artisan migrate --force`
4. Set start command: `php artisan serve`

### On InfinityFree
1. Upload via FileZilla
2. Import database
3. Update .env file

## Project Structure

```
career-pulse/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   └── Middleware/
│   └── Models/
├── database/
│   ├── migrations/
│   └── seeders/
├── public/
│   ├── uploads/
│   └── css/js assets
├── resources/
│   └── views/
│       ├── admin/
│       ├── frontend/
│       └── layouts/
└── routes/
    └── web.php
```

## License

MIT License