
# Laravel 8 E‑Commerce

An e‑commerce website built with **PHP Laravel 8**, featuring a storefront and an admin panel. Includes full Turkish tutorial on YouTube.

## 🎥 Video Tutorial

Follow along with the full development walkthrough in Turkish on YouTube:  
https://www.youtube.com/watch?v=UnNHWRenYTA&list=PLIUezwWmVtFX3aoVpOh5ZVn_EtKuX8fXw

## 🌟 Features

- 🛍️ Front‑end store with product listing, search, and filter
- 🧑‍💻 Shopping cart and checkout
- 🔐 User authentication (register, login, logout)
- ⚙️ Admin panel: manage products, categories, orders
- 🎨 Multiple templates stored in `TEMPS/` directory
- 🌐 Built on Laravel 8

## 🛠️ Tech Stack

- PHP 7.x+ with Laravel 8 framework
- Blade templating and Bootstrap for responsive UI
- MySQL / MariaDB (configured via `.env`)
- Laravel features: Eloquent ORM, Middleware, Form Validation
- Optional JavaScript enhancements via Laravel Mix

## 🚀 Installation Guide

1. **Clone the repo**  
   ```bash
   git clone https://github.com/celikyuksell/Laravel-8-E-Commerce.git
   cd Laravel-8-E-Commerce
   ```
2. **Install PHP dependencies**  
   ```bash
   composer install
   ```
3. **Install front‑end assets**  
   ```bash
   npm install
   ```
4. **Environment setup**  
   Copy `.env.example` to `.env`, then configure:
   ```dotenv
   DB_CONNECTION=mysql
   DB_DATABASE=your_db
   DB_USERNAME=your_user
   DB_PASSWORD=your_pass
   ```
5. **Generate app key**  
   ```bash
   php artisan key:generate
   ```
6. **Run database migrations**  
   ```bash
   php artisan migrate
   ```
7. **Compile assets**  
   ```bash
   npm run dev
   ```
8. **Serve locally**  
   ```bash
   php artisan serve
   ```
   Visit: http://127.0.0.1:8000

## 👤 About the Author

Developed by **Yuksel Celik** ([@celikyuksell](https://github.com/celikyuksell))  
For more tutorials, visit: https://www.youtube.com/c/YukselCELIK
