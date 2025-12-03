# TB Shop Admin Panel Implementation

**Project:** TB Shop - Gundam Model Kit Store
**Framework:** Laravel 12
**Styling:** Pure CSS (No Bootstrap, No Tailwind)
**Implementation Date:** 2nd December 2025
**Developer:** Phan Trần Thái Bảo (DH52200374)

---

## Table of Contents

1. [Overview](#overview)
2. [Database Schema](#database-schema)
3. [CSS Architecture](#css-architecture)
4. [Admin Modules](#admin-modules)
5. [Getting Started](#getting-started)
6. [Usage Guide](#usage-guide)
7. [File Structure](#file-structure)

---

## Overview

The TB Shop Admin Panel is a comprehensive management system for the Gundam Model Kit e-commerce store. Built with Laravel 12 and styled entirely with custom CSS using modern Flexbox and Grid layouts, it provides a clean, professional interface for managing all aspects of the store.

### Features Implemented

- **Dashboard**: Real-time statistics (Total Revenue, Orders, Products, Users)
- **Category Management**: Full CRUD operations for product categories
- **Product Management**: Complete product management with image upload
- **Order Management**: View orders and update order status
- **User Management**: View and manage customer accounts

### Technology Stack

- **Backend**: Laravel 12, PHP 8.3
- **Database**: MySQL/PostgreSQL (via Laravel migrations)
- **Frontend**: Blade Templates, Pure CSS (Flexbox + Grid)
- **JavaScript**: Vanilla JS for simple interactions

---

## Database Schema

### Independent Tables

#### 1. Users Table
```sql
- id (Primary Key)
- username (unique)
- password (hashed)
- full_name
- email (unique)
- phone_number
- address
- role (enum: 'admin', 'customer')
- created_at
- updated_at
```

#### 2. Categories Table
```sql
- id (Primary Key)
- name
- description
- created_at
- updated_at
```

### Dependent Tables

#### 3. Products Table
```sql
- id (Primary Key)
- name
- description
- price (decimal 10,2)
- stock_quantity (integer)
- thumbnail (image path)
- scale (e.g., 1/144)
- grade (e.g., HG, RG, MG)
- manufacturer (e.g., Bandai)
- category_id (Foreign Key -> categories.id, onDelete: set null)
- created_at
- updated_at
```

#### 4. Product Images Table
```sql
- id (Primary Key)
- image_url
- product_id (Foreign Key -> products.id, onDelete: cascade)
```

#### 5. Orders Table
```sql
- id (Primary Key)
- full_name
- phone_number
- shipping_address
- note
- total_money (decimal 10,2)
- status (enum: pending, processing, shipped, delivered, cancelled)
- order_date (datetime)
- user_id (Foreign Key -> users.id, onDelete: cascade)
- created_at
- updated_at
```

#### 6. Reviews Table
```sql
- id (Primary Key)
- rating (integer)
- comment (text)
- user_id (Foreign Key -> users.id, onDelete: cascade)
- product_id (Foreign Key -> products.id, onDelete: cascade)
- created_at
- updated_at
```

#### 7. Order Details Table
```sql
- id (Primary Key)
- price (decimal 10,2)
- quantity (integer)
- total_price (decimal 10,2)
- order_id (Foreign Key -> orders.id, onDelete: cascade)
- product_id (Foreign Key -> products.id, onDelete: cascade)
```

### Entity Relationships

```
User (1) ----< (M) Orders
User (1) ----< (M) Reviews
Category (1) ----< (M) Products
Product (1) ----< (M) ProductImages
Product (1) ----< (M) OrderDetails
Product (1) ----< (M) Reviews
Order (1) ----< (M) OrderDetails
```

---

## CSS Architecture

### Layout System

The admin panel uses a **Fixed Sidebar + Main Content** layout built with CSS Flexbox:

```css
.admin-container {
    display: flex;
    min-height: 100vh;
}

.admin-sidebar {
    width: 260px;
    position: fixed;
    height: 100vh;
}

.admin-main {
    margin-left: 260px;
    width: calc(100% - 260px);
}
```

### Design Principles

1. **CSS Variables**: All colors, spacing, and shadows defined in `:root` for easy customization
2. **Flexbox Navigation**: Sidebar menu uses flexbox for alignment
3. **Grid Layouts**: Dashboard statistics use CSS Grid with `repeat(auto-fit, minmax(250px, 1fr))`
4. **Responsive Design**: Mobile-friendly with sidebar collapse at `max-width: 768px`
5. **Custom Components**: All buttons, forms, tables, badges styled without frameworks

### Key CSS Components

- **Sidebar Menu**: Dark theme with hover effects and active states
- **Statistics Cards**: Grid layout with box shadows and hover animations
- **Data Tables**: Striped rows with hover effects
- **Forms**: Clean input styling with focus states
- **Badges**: Color-coded status indicators (pending, processing, shipped, etc.)
- **Buttons**: Primary (green), Danger (red), Secondary (gray) variants

### Color Scheme

```css
--sidebar-bg: #1a1d29 (Dark slate)
--primary-color: #4CAF50 (Green - for save actions)
--danger-color: #f44336 (Red - for delete actions)
--warning-color: #ff9800 (Orange)
--info-color: #2196F3 (Blue)
```

---

## Admin Modules

### 1. Dashboard Module

**Controller**: `App\Http\Controllers\Admin\DashboardController`
**Route**: `GET /admin`
**View**: `resources/views/admin/dashboard.blade.php`

**Features:**
- Display 4 key statistics in card format
- Total Revenue (from delivered/shipped orders)
- Total Orders count
- Total Products count
- Total Users count (customers only)

**Code Example:**
```php
$totalRevenue = Order::whereIn('status', ['delivered', 'shipped'])->sum('total_money');
```

---

### 2. Category Management

**Controller**: `App\Http\Controllers\Admin\CategoryController`
**Routes**:
- `GET /admin/categories` - List all
- `GET /admin/categories/create` - Create form
- `POST /admin/categories` - Store new
- `GET /admin/categories/{id}/edit` - Edit form
- `PUT /admin/categories/{id}` - Update
- `DELETE /admin/categories/{id}` - Delete

**Features:**
- Simple CRUD operations
- Display product count per category
- Form validation

**Views:**
- `index.blade.php` - Table list with Edit/Delete buttons
- `create.blade.php` - Add new category form
- `edit.blade.php` - Edit existing category

---

### 3. Product Management

**Controller**: `App\Http\Controllers\Admin\ProductController`
**Routes**: Resource routes (`admin/products/*`)

**Features:**
- Full CRUD operations
- **Image Upload**: Handles thumbnail upload to `public/images/products/`
- **Category Selection**: Dynamic dropdown from database
- **Form Fields**: Name, Description, Price, Stock, Scale, Grade, Manufacturer
- **Image Preview**: JavaScript preview before upload
- **Image Cleanup**: Deletes old image on update/delete

**Key Implementation:**
```php
if ($request->hasFile('thumbnail')) {
    $file = $request->file('thumbnail');
    $filename = time() . '_' . $file->getClientOriginalName();
    $file->move(public_path('images/products'), $filename);
    $validated['thumbnail'] = 'images/products/' . $filename;
}
```

**Views:**
- `index.blade.php` - Paginated product list with thumbnails
- `create.blade.php` - Add product with image upload
- `edit.blade.php` - Edit with current image display

---

### 4. Order Management

**Controller**: `App\Http\Controllers\Admin\OrderController`
**Routes**:
- `GET /admin/orders` - List all orders
- `GET /admin/orders/{id}` - View order details
- `PATCH /admin/orders/{id}/status` - Update order status
- `DELETE /admin/orders/{id}` - Delete order

**Features:**
- **Order List**: Displays customer name, date, total, status
- **Order Details**: Shows customer info, shipping address, and order items table
- **Status Update**: Dropdown to change status (pending → processing → shipped → delivered)
- **Status Badges**: Color-coded for visual clarity

**Order Detail View Includes:**
- Customer information grid
- Order items table with product name, price, quantity
- Status update form

---

### 5. User Management

**Controller**: `App\Http\Controllers\Admin\UserController`
**Routes**:
- `GET /admin/users` - List all users
- `DELETE /admin/users/{id}` - Delete user (customers only)

**Features:**
- Display all users with order count
- **Admin Protection**: Cannot delete admin users
- Role badges (Admin/Customer)
- Shows registration date and contact info

**Security:**
```php
if ($user->role === 'admin') {
    return redirect()->back()->with('error', 'Cannot delete admin users.');
}
```

---

## Getting Started

### Prerequisites

- PHP 8.3 or higher
- Composer
- MySQL or PostgreSQL database
- Laravel 12

### Installation Steps

#### 1. Install Dependencies
```bash
composer install
```

#### 2. Configure Environment
```bash
cp .env.example .env
php artisan key:generate
```

Edit `.env` and configure your database:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=tb_shop
DB_USERNAME=root
DB_PASSWORD=
```

#### 3. Run Migrations
```bash
php artisan migrate
```

This will create all 7 tables with proper foreign keys.

#### 4. Seed Admin User
```bash
php artisan db:seed --class=AdminUserSeeder
```

**Default Admin Credentials:**
- Username: `admin`
- Password: `admin123`
- Email: `admin@tbshop.com`

#### 5. Create Images Directory
```bash
mkdir -p public/images/products
```

#### 6. Start Development Server
```bash
php artisan serve
```

#### 7. Access Admin Panel
Open browser: `http://127.0.0.1:8000/admin`

---

## Usage Guide

### Creating Your First Admin User (Alternative Method)

If you prefer to create manually via Tinker:

```bash
php artisan tinker
```

```php
use App\Models\User;
use Illuminate\Support\Facades\Hash;

User::create([
    'username' => 'admin',
    'password' => Hash::make('admin123'),
    'full_name' => 'Administrator',
    'email' => 'admin@tbshop.com',
    'phone_number' => '0364518019',
    'address' => '180 Cao Lỗ, Phường 4, Quận 8, TP HCM',
    'role' => 'admin',
]);
```

### Adding Categories

1. Navigate to **Categories** in sidebar
2. Click **Add New Category**
3. Enter name (e.g., "High Grade")
4. Enter description (optional)
5. Click **Create Category**

### Adding Products

1. Navigate to **Products** in sidebar
2. Click **Add New Product**
3. Fill in required fields:
   - Product Name *
   - Price (VND) *
   - Stock Quantity *
4. Optional fields:
   - Category (select from dropdown)
   - Description
   - Scale (e.g., 1/144)
   - Grade (e.g., HG)
   - Manufacturer (e.g., Bandai)
   - Thumbnail Image
5. Click **Create Product**

**Image Upload Notes:**
- Accepted formats: JPEG, PNG, JPG, GIF
- Max file size: 2MB
- Images stored in: `public/images/products/`

### Managing Orders

1. Navigate to **Orders** in sidebar
2. Click **View** on any order to see details
3. On order detail page:
   - Review customer information
   - Check order items
   - Update status using dropdown
   - Click **Update Status**

**Order Status Flow:**
```
Pending → Processing → Shipped → Delivered
              ↓
          Cancelled
```

### Managing Users

1. Navigate to **Users** in sidebar
2. View all registered users
3. Click **Delete** for customer accounts (admin protected)

**Note**: Admin users are protected and cannot be deleted.

---

## File Structure

```
ProjectWeb/
├── app/
│   ├── Http/Controllers/
│   │   └── Admin/
│   │       ├── DashboardController.php
│   │       ├── CategoryController.php
│   │       ├── ProductController.php
│   │       ├── OrderController.php
│   │       └── UserController.php
│   └── Models/
│       ├── User.php
│       ├── Category.php
│       ├── Product.php
│       ├── ProductImage.php
│       ├── Order.php
│       ├── OrderDetail.php
│       └── Review.php
├── database/
│   ├── migrations/
│   │   ├── 2025_12_02_create_users_table.php
│   │   ├── 2025_12_02_create_categories_table.php
│   │   ├── 2025_12_02_create_products_table.php
│   │   ├── 2025_12_02_create_product_images_table.php
│   │   ├── 2025_12_02_create_orders_table.php
│   │   ├── 2025_12_02_create_reviews_table.php
│   │   └── 2025_12_02_create_order_details_table.php
│   └── seeders/
│       └── AdminUserSeeder.php
├── public/
│   ├── css/
│   │   └── admin.css (Professional custom styling)
│   └── images/
│       └── products/ (Product uploads)
├── resources/views/
│   ├── layouts/
│   │   └── admin.blade.php (Master layout)
│   └── admin/
│       ├── dashboard.blade.php
│       ├── categories/
│       │   ├── index.blade.php
│       │   ├── create.blade.php
│       │   └── edit.blade.php
│       ├── products/
│       │   ├── index.blade.php
│       │   ├── create.blade.php
│       │   └── edit.blade.php
│       ├── orders/
│       │   ├── index.blade.php
│       │   └── show.blade.php
│       └── users/
│           └── index.blade.php
├── routes/
│   └── web.php (All admin routes)
└── docs/
    └── admin_panel_implementation.md (This file)
```

---

## Model Relationships

### User Model
```php
public function orders() // hasMany
public function reviews() // hasMany
```

### Category Model
```php
public function products() // hasMany
```

### Product Model
```php
public function category() // belongsTo
public function images() // hasMany
public function orderDetails() // hasMany
public function reviews() // hasMany
```

### Order Model
```php
public function user() // belongsTo
public function orderDetails() // hasMany
```

### OrderDetail Model
```php
public function order() // belongsTo
public function product() // belongsTo
```

### Review Model
```php
public function user() // belongsTo
public function product() // belongsTo
```

---

## Security Considerations

1. **Password Hashing**: All passwords use Laravel's `Hash::make()`
2. **CSRF Protection**: All forms include `@csrf` token
3. **Method Spoofing**: PUT/DELETE forms use `@method` directive
4. **File Upload Validation**: Image uploads validated for type and size
5. **Admin Protection**: Admin users cannot be deleted
6. **SQL Injection**: Eloquent ORM prevents SQL injection
7. **XSS Prevention**: Blade `{{ }}` auto-escapes output

---

## Customization

### Changing Colors

Edit `public/css/admin.css`:

```css
:root {
    --primary-color: #4CAF50; /* Change to your brand color */
    --sidebar-bg: #1a1d29; /* Change sidebar color */
}
```

### Adding New Admin Pages

1. Create controller in `app/Http/Controllers/Admin/`
2. Create views in `resources/views/admin/`
3. Add routes in `routes/web.php` under admin group
4. Add sidebar link in `layouts/admin.blade.php`

---

## Future Enhancements

- [ ] Add authentication middleware for admin routes
- [ ] Implement search and filtering for products/orders
- [ ] Add pagination controls customization
- [ ] Export orders to CSV/PDF
- [ ] Product image gallery (multiple images)
- [ ] Dashboard charts with Chart.js
- [ ] Email notifications for order status changes
- [ ] Admin activity logs
- [ ] Advanced reporting and analytics

---

## Support & Contact

**Developer:** Phan Trần Thái Bảo
**Student ID:** DH52200374
**Class:** D22-TH11
**Email:** dh52200374@student.stu.edu.vn
**University:** Saigon Technology University

---

## License

This is a student project created for educational purposes at Saigon Technology University.

---

**Last Updated:** December 2, 2025
