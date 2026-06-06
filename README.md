# Inventory System

A simple inventory management system built with Laravel for small businesses.

## Features
- Add, edit, delete products
- Track stock quantities
- Low stock alert (row turns red when quantity drops below threshold)
- Soft deletes — data never permanently lost
- Input validation and mass assignment protection

## Tech Stack
- Laravel 13
- PHP 8.4
- SQLite
- Blade templating

## Setup
```bash
git clone https://github.com/syahmiabdulhalim/Inventory-system
cd Inventory-system
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve
```