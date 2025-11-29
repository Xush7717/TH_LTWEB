# TB Shop - Gundam Model Kit Store

A Laravel-powered e-commerce platform for selling Gundam model kits, featuring MVC architecture, Blade templating, and modern routing.

**Student Information:**
- Name: Phan Trần Thái Bảo
- Student ID: DH52200374
- Class: D22-TH11
- Group: 25 (Monday, Session 3)

---

## 🚀 Quick Start

### Prerequisites
- PHP 8.3 or higher
- Composer
- A web browser

### Installation

1. **Clone the repository**
```bash
git clone <repository-url>
cd DeTai
```

2. **Install dependencies**
```bash
composer install
```

3. **Set up environment**
```bash
cp .env.example .env
php artisan key:generate
```

4. **Run the development server**
```bash
php artisan serve
```

5. **Access the application**
Open your browser and navigate to: `http://127.0.0.1:8000`

---

## 📁 Project Structure

```
DeTai/
├── app/
│   └── Http/Controllers/     # Application controllers
│       ├── HomeController.php
│       ├── CategoryController.php
│       ├── ProductController.php
│       └── AuthController.php
├── resources/
│   └── views/                # Blade templates
│       ├── layouts/          # Layout files
│       ├── components/       # Reusable components
│       └── pages/            # Page templates
├── public/                   # Public assets
│   ├── css/                  # Stylesheets
│   ├── js/                   # JavaScript
│   ├── images/               # Images
│   └── fonts/                # Fonts
├── routes/
│   └── web.php              # Web routes
├── database/
│   └── migrations/          # Database migrations
├── src_backup/              # Original HTML files (backup)
└── .env                     # Environment configuration
```

---

## ✨ Features

### Implemented Features
- ✅ Responsive design with mobile navigation
- ✅ Product catalog with categories (HG, RG, MG)
- ✅ Product detail pages (4 featured products)
- ✅ Image slider on homepage
- ✅ Shopping cart interface (UI)
- ✅ User authentication pages (UI)
- ✅ Contact information with embedded map
- ✅ **Laravel MVC architecture**
- ✅ **Blade templating system**
- ✅ **Clean routing with named routes**
- ✅ **Component-based layout system**
- ✅ **Controller-based logic separation**

### Product Categories
1. **High Grade (HG)** - Entry-level model kits
2. **Real Grade (RG)** - Advanced detail model kits
3. **Master Grade (MG)** - Premium model kits with high detail

---

## 🛣️ Routes

### Public Routes
- `GET /` - Homepage
- `GET /about` - About page
- `GET /labs` - Labs exercises
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

---

## 🎨 Technologies Used

### Backend
- **Laravel 12** - PHP framework
- **PHP 8.3** - Server-side scripting
- **Blade** - Templating engine

### Frontend
- **HTML5** - Structure and content
- **CSS3** - Styling and layout
- **JavaScript** - Interactive features

### Tools
- **Composer** - Dependency management
- **Git** - Version control

---

## 📚 Documentation

For detailed setup and development guide, see [LARAVEL_SETUP.md](LARAVEL_SETUP.md)

### Key Documentation Topics
- Project structure explained
- Controller documentation
- Blade template usage
- Asset management
- Adding new pages
- Database integration guide
- Troubleshooting

---

## 🔮 Future Enhancements

### Backend Integration
- [ ] MySQL/PostgreSQL database integration
- [ ] Product model and repository
- [ ] User authentication system
- [ ] Shopping cart functionality
- [ ] Order management system
- [ ] Admin dashboard

### Frontend Improvements
- [ ] Vue.js or React integration
- [ ] AJAX product loading
- [ ] Real-time search
- [ ] Image zoom functionality
- [ ] Product reviews and ratings

### DevOps
- [ ] Docker containerization
- [ ] CI/CD pipeline
- [ ] Automated testing
- [ ] Production deployment

### Features
- [ ] Product search functionality
- [ ] Advanced filtering and sorting
- [ ] Wishlist functionality
- [ ] Payment gateway integration
- [ ] Email notifications
- [ ] Inventory management

---

## 🗂️ Migration History

**November 29, 2025**: Laravel Integration
- ✅ Migrated from static HTML to Laravel
- ✅ Implemented MVC architecture
- ✅ Created Blade templates with layouts
- ✅ Set up routing system
- ✅ Organized assets in public directory
- ✅ Created comprehensive documentation

**November 10, 2024**: Project Restructuring
- Reorganized directory structure
- Separated production code from lab exercises
- Consolidated assets
- Updated documentation

**May 17, 2024**: Initial Development
- Homepage with slider
- Product catalog
- Category pages
- Authentication pages (UI only)

---

## 🎯 Development Workflow

### Adding a New Page

1. Create Blade template in `resources/views/pages/`
2. Add route in `routes/web.php`
3. Create controller method (if needed)
4. Link from navigation or other pages

### Adding New Styles

1. Add CSS file to `public/css/custom/`
2. Include in layout or use `@push('styles')`

### Running Tests

```bash
php artisan test
```

### Clearing Cache

```bash
php artisan cache:clear
php artisan view:clear
php artisan route:clear
php artisan config:clear
```

---

## 📞 Contact Information

**Address:** 180 Cao Lỗ, Phường 4, Quận 8, TP Hồ Chí Minh
**Email:** dh52200374@student.stu.edu.vn
**Phone:** 0364518019

---

## 📄 License

This is a student project created for educational purposes at Saigon Technology University.

---

## 🙏 Acknowledgments

- Laravel Framework - https://laravel.com
- Gundam model kit images - Educational use only
- Saigon Technology University

---

**Note:** This project demonstrates the integration of Laravel framework with an existing frontend. The authentication and shopping cart features are UI-only and require database integration for full functionality.

For Laravel framework documentation, visit: https://laravel.com/docs
