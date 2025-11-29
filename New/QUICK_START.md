# Quick Start Guide - TBShop Laravel

## ⚡ Running the Application

### Start the Server
```bash
php artisan serve
```

Visit: **http://127.0.0.1:8000**

### Stop the Server
Press `Ctrl+C` in the terminal

---

## 📍 Available Pages

| URL | Description |
|-----|-------------|
| `/` | Homepage with slider and products |
| `/about` | About page |
| `/labs` | Lab exercises |
| `/categories/hg` | High Grade products |
| `/categories/rg` | Real Grade products |
| `/categories/mg` | Master Grade products |
| `/products/1` | Product detail (IDs: 1-4) |
| `/login` | Login page |
| `/register` | Registration page |

---

## 🗂️ File Locations

### Controllers
- `app/Http/Controllers/HomeController.php` - Home, About, Labs
- `app/Http/Controllers/CategoryController.php` - Category pages
- `app/Http/Controllers/ProductController.php` - Product details
- `app/Http/Controllers/AuthController.php` - Login/Register

### Views
- `resources/views/layouts/app.blade.php` - Main layout
- `resources/views/components/header.blade.php` - Header
- `resources/views/components/footer.blade.php` - Footer
- `resources/views/pages/` - All page templates

### Routes
- `routes/web.php` - All routes defined here

### Assets
- `public/css/` - Stylesheets
- `public/js/` - JavaScript files
- `public/images/` - Images

---

## 🔧 Common Commands

### Clear All Cache
```bash
php artisan optimize:clear
```

### View Routes
```bash
php artisan route:list
```

### Check Laravel Version
```bash
php artisan --version
```

---

## 🚀 Next Steps

1. ✅ Laravel is installed and configured
2. ✅ All pages are converted to Blade templates
3. ✅ Routes and controllers are set up
4. ⏭️ Add database integration (see LARAVEL_SETUP.md)
5. ⏭️ Implement real authentication
6. ⏭️ Add shopping cart functionality

---

## 📚 Documentation

- **Full Setup Guide:** [LARAVEL_SETUP.md](LARAVEL_SETUP.md)
- **Main README:** [README.md](README.md)
- **Laravel Docs:** https://laravel.com/docs

---

## ✅ What Changed

### Before (Static HTML)
```
src/index.html
src/pages/about.html
src/assets/css/style.css
```

### After (Laravel)
```
resources/views/pages/home.blade.php
resources/views/pages/about.blade.php
public/css/custom/style.css
```

### Key Improvements
- 🎯 Clean URLs: `/products/1` instead of `/pages/products/product_detail_1.html`
- 🔄 Reusable components: Header/Footer in one place
- 🏗️ MVC structure: Controllers handle logic, Views handle presentation
- 🛣️ Named routes: `route('home')` instead of hardcoded paths
- 🔐 CSRF protection on forms

---

## 🆘 Troubleshooting

### Port Already in Use
```bash
php artisan serve --port=8001
```

### Assets Not Loading
Check that files are in `public/` directory, not `src/`

### Route Not Found
```bash
php artisan route:cache
```

### Permission Errors (Linux/Mac)
```bash
chmod -R 775 storage bootstrap/cache
```

---

**Student:** Phan Trần Thái Bảo (DH52200374)
**Updated:** November 29, 2025
