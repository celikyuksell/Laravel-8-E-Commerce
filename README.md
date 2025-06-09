
# PHP Laravel 5.6 E‑Commerce

A basic e-commerce web application built with PHP and Laravel 5.6, accompanied by a step‑by‑step YouTube playlist!

## 🎥 YouTube Tutorial
Follow the development process on YouTube:  
https://www.youtube.com/playlist?list=PLIUezwWmVtFXa9JcBeUcSbze-_sS-U8Pg

## 🚀 Features
- 🛒 Product catalog and shopping cart
- 🧑‍💻 User registration, login & profile
- 🔎 Category-based search and filtering
- 💳 Order placement and checkout flow
- 📧 Email notifications (order confirmation)
- 🛠️ Basic admin panel (manage products/orders)
- 🧪 Laravel features: Eloquent, Blade, Middleware, Validation

## 🛠 Tech Stack
- PHP 7.x / Laravel 5.6
- MySQL / MariaDB (via `.env`)
- Blade templating + Bootstrap (front-end)
- Optional: Vue.js components
- yarn mix (Webpack) for assets

## 📦 Installation
1. **Clone repo**  
   ```bash
   git clone https://github.com/celikyuksell/Php-Laravel-5.6-E-Commerce.git
   cd Php-Laravel-5.6-E-Commerce
   ```
2. **Install PHP dependencies**  
   ```bash
   composer install
   ```
3. **Install JS dependencies**  
   ```bash
   npm install
   ```
4. **Copy `.env.example` to `.env`** and set `DATABASE_URL`
5. **Generate app key**  
   ```bash
   php artisan key:generate
   ```
6. **Run migrations**  
   ```bash
   php artisan migrate
   ```
7. **Build assets**  
   ```bash
   npm run dev
   ```
8. **Serve**  
   ```bash
   php artisan serve
   ```
   Open http://127.0.0.1:8000

## 👤 Author
Created by [Yuksel Celik](https://github.com/celikyuksell)  
Explore more tutorials on [YouTube](https://www.youtube.com/c/yukselcelik)
