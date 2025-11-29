# TBShop - Laravel Integration Guide

## Overview

This project has been successfully migrated from a static HTML/CSS/JS website to a full Laravel application with Blade templating, MVC architecture, and modern routing.

## Project Structure

```
DeTai/
├── app/
│   └── Http/
│       └── Controllers/          # All controllers
│           ├── HomeController.php       # Home, About, Labs pages
│           ├── CategoryController.php   # HG, RG, MG categories
│           ├── ProductController.php    # Product details
│           └── AuthController.php       # Login & Register
├── resources/
│   └── views/                    # Blade templates
│       ├── layouts/
│       │   └── app.blade.php            # Main layout
│       ├── components/
│       │   ├── header.blade.php         # Header component
│       │   └── footer.blade.php         # Footer component
│       └── pages/
│           ├── home.blade.php           # Homepage
│           ├── about.blade.php          # About page
│           ├── labs.blade.php           # Labs page
│           ├── auth/
│           │   ├── login.blade.php
│           │   └── register.blade.php
│           ├── categories/
│           │   ├── hg.blade.php
│           │   ├── rg.blade.php
│           │   └── mg.blade.php
│           └── products/
│               └── detail.blade.php
├── public/                       # Public assets
│   ├── css/                      # Stylesheets
│   ├── js/                       # JavaScript files
│   ├── images/                   # Images
│   └── fonts/                    # Fonts
├── routes/
│   └── web.php                   # All web routes
├── src_backup/                   # Original HTML files (backup)
└── .env                          # Environment configuration
```

## Routes

All routes are defined in `routes/web.php`:

### Public Routes
- `GET /` - Homepage
- `GET /about` - About page
- `GET /labs` - Labs page
- `GET /search` - Search functionality

### Category Routes
- `GET /categories/hg` - High Grade products
- `GET /categories/rg` - Real Grade products
- `GET /categories/mg` - Master Grade products

### Product Routes
- `GET /products/{id}` - Product detail page

### Authentication Routes
- `GET /login` - Login form
- `POST /login` - Login submission
- `GET /register` - Registration form
- `POST /register` - Registration submission

## Controllers

### HomeController
**Location:** `app/Http/Controllers/HomeController.php`

Handles:
- Homepage (`index()`)
- About page (`about()`)
- Labs page (`labs()`)
- Search functionality (`search()`)

### CategoryController
**Location:** `app/Http/Controllers/CategoryController.php`

Handles:
- High Grade category (`hg()`)
- Real Grade category (`rg()`)
- Master Grade category (`mg()`)

### ProductController
**Location:** `app/Http/Controllers/ProductController.php`

Handles:
- Product details with sample data (`detail($id)`)
- Contains sample product data (4 products)

**Note:** In production, replace sample data with database queries.

### AuthController
**Location:** `app/Http/Controllers/AuthController.php`

Handles:
- Login form display (`showLogin()`)
- Login processing (`login()`)
- Registration form display (`showRegister()`)
- Registration processing (`register()`)

**Note:** Authentication logic is placeholder. Implement proper authentication using Laravel's built-in auth system.

## Blade Templates

### Layout System

**Main Layout:** `resources/views/layouts/app.blade.php`
- Uses `@yield` for content injection
- Uses `@stack` for dynamic scripts/styles
- Includes header and footer components

**Header Component:** `resources/views/components/header.blade.php`
- Navigation menu
- Search form
- Cart and login links

**Footer Component:** `resources/views/components/footer.blade.php`
- Contact information
- Google Maps embed
- Student information

### Page Templates

All pages extend the main layout using:
```blade
@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
    <!-- Page content here -->
@endsection
```

## Asset Management

Assets are served from the `public/` directory:

### Using Assets in Blade
```blade
<!-- CSS -->
<link rel="stylesheet" href="{{ asset('css/custom/style.css') }}">

<!-- JavaScript -->
<script src="{{ asset('js/custom/script.js') }}"></script>

<!-- Images -->
<img src="{{ asset('images/logos/Logo.png') }}" alt="Logo">
```

### Using Routes in Blade
```blade
<!-- Named routes -->
<a href="{{ route('home') }}">Home</a>
<a href="{{ route('product.detail', 1) }}">Product 1</a>

<!-- Routes with parameters -->
<a href="{{ route('category.hg') }}">High Grade</a>
```

## Running the Application

### Development Server

Start the Laravel development server:
```bash
php artisan serve
```

The application will be available at: `http://127.0.0.1:8000`

### Environment Configuration

The `.env` file contains application configuration:
- Database connection (currently SQLite for development)
- Application name and URL
- Debug mode settings

## Database Integration (Future)

To add database functionality:

### 1. Create Migrations
```bash
php artisan make:migration create_products_table
php artisan make:migration create_categories_table
```

### 2. Define Schema
Edit migration files in `database/migrations/`

### 3. Run Migrations
```bash
php artisan migrate
```

### 4. Create Models
```bash
php artisan make:model Product
php artisan make:model Category
```

### 5. Update Controllers
Replace sample data with Eloquent queries:
```php
// Instead of:
private function getProducts() { ... }

// Use:
use App\Models\Product;
public function detail($id) {
    $product = Product::findOrFail($id);
    return view('pages.products.detail', compact('product'));
}
```

## Key Improvements from Static HTML

### 1. DRY Principle
- Header and footer are in components (no duplication)
- Main layout is reused across all pages
- Asset paths use `asset()` helper

### 2. Clean URLs
- Before: `/pages/products/product_detail_1.html`
- After: `/products/1`

### 3. Maintainability
- Single source of truth for navigation
- Easy to update header/footer globally
- Centralized routing

### 4. Scalability
- Ready for database integration
- Easy to add new routes and controllers
- Supports middleware for authentication

### 5. Security
- CSRF protection on forms
- Input validation
- Environment-based configuration

## Development Workflow

### Adding a New Page

1. **Create a Blade template:**
```bash
# Create file: resources/views/pages/newpage.blade.php
```

2. **Add a route:**
```php
// routes/web.php
Route::get('/newpage', [HomeController::class, 'newpage'])->name('newpage');
```

3. **Add controller method:**
```php
// app/Http/Controllers/HomeController.php
public function newpage()
{
    return view('pages.newpage');
}
```

### Adding a New Component

1. **Create component file:**
```bash
# Create file: resources/views/components/newcomponent.blade.php
```

2. **Include in layout or page:**
```blade
@include('components.newcomponent')
```

## Styling and JavaScript

### Current Assets
- CSS files in `public/css/custom/`
- JavaScript files in `public/js/custom/`
- All original styles preserved

### Adding Page-Specific Styles
```blade
@push('styles')
<link rel="stylesheet" href="{{ asset('css/custom/about.css') }}">
@endpush
```

### Adding Page-Specific Scripts
```blade
@push('page-scripts')
<script>
    // Your JavaScript here
</script>
@endpush
```

## Backup

Your original HTML files are preserved in `src_backup/` directory.

## Next Steps

### Recommended Enhancements

1. **Database Integration**
   - Set up MySQL/PostgreSQL
   - Create Product, Category, User models
   - Migrate sample data to database

2. **Authentication System**
   - Use Laravel Breeze or Jetstream
   - Implement proper login/logout
   - Add password reset functionality

3. **Shopping Cart**
   - Session-based cart
   - Add to cart functionality
   - Checkout process

4. **Admin Panel**
   - Product management
   - Category management
   - Order management

5. **Search Functionality**
   - Implement product search
   - Filter by category, price
   - Sort options

6. **API Development**
   - RESTful API endpoints
   - API authentication
   - Mobile app support

## Troubleshooting

### Issue: Assets not loading
**Solution:** Run `php artisan storage:link` and ensure assets are in `public/` directory

### Issue: Routes not working
**Solution:** Clear route cache with `php artisan route:clear`

### Issue: Views not updating
**Solution:** Clear view cache with `php artisan view:clear`

### Issue: Permission errors
**Solution:** Set proper permissions:
```bash
chmod -R 775 storage bootstrap/cache
```

## Support

For Laravel documentation: https://laravel.com/docs

For issues specific to this project:
- Student: Phan Trần Thái Bảo
- MSSV: DH52200374
- Email: dh52200374@student.stu.edu.vn

---

**Last Updated:** November 29, 2025
**Laravel Version:** 12.x
**PHP Version:** 8.3.26
