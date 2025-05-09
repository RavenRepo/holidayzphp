# Production Deployment Guide: Holidayz Manager (Laravel Monorepo)

> **Reference:** [Hostinger: How to Deploy Laravel 8 at Hostinger](https://support.hostinger.com/en/articles/6152127-how-to-deploy-laravel-8-at-hostinger)

---

## Table of Contents
1. [Preparation](#preparation)
2. [Uploading Files](#uploading-files)
3. [Configuring Public Directory](#configuring-public-directory)
4. [Environment Variables](#environment-variables)
5. [Database Setup](#database-setup)
6. [Running Migrations](#running-migrations)
7. [File Permissions](#file-permissions)
8. [Artisan Commands & Cron Jobs](#artisan-commands--cron-jobs)
9. [Troubleshooting & Best Practices](#troubleshooting--best-practices)

---

## 1. Preparation
- **Activate your Hostinger hosting plan** and add your deployment domain.
- Ensure you have access to the Hostinger File Manager or FTP, and SSH (for artisan commands).
- Build frontend assets locally (`npm run build` in each app if needed).
- Ensure your `.env.production` or `.env` file is ready with production values (never commit secrets to git).

## 2. Uploading Files
- **Monorepo structure:**
  - Upload the entire project (excluding `node_modules`, `vendor`, and other dev files) to your hosting root, one level above `public_html`.
  - Example structure after upload:
    ```
    /laravel (your project root)
    /public_html
    ```
- **Move public files:**
  - Move all files from `/laravel/public/` to `/public_html/`.

## 3. Configuring Public Directory
- **Edit `index.php` in `public_html`:**
  - Replace its content with:
    ```php
    <?php
    define('LARAVEL_START', microtime(true));
    require __DIR__.'/../laravel/vendor/autoload.php';
    $app = require_once __DIR__.'/../laravel/bootstrap/app.php';
    $kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
    $response = $kernel->handle(
        $request = Illuminate\Http\Request::capture()
    );
    $response->send();
    $kernel->terminate($request, $response);
    ```
- **Edit `.htaccess` in `public_html`:**
  - Add the following rule if not present:
    ```apache
    <IfModule mod_rewrite.c>
      RewriteEngine On
      RewriteRule ^(.*)$ public/$1 [L]
    </IfModule>
    ```

## 4. Environment Variables
- Copy your `.env.production` or `.env` file to `/laravel/.env`.
- Update the following for production:
  - `APP_ENV=production`
  - `APP_DEBUG=false`
  - `APP_URL=https://yourdomain.com`
  - Database credentials (see next section)
  - Mail, cache, and other service credentials

## 5. Database Setup
- **MySQL:**
  - Create a new database in Hostinger's control panel.
  - Update `.env`:
    ```env
    DB_CONNECTION=mysql
    DB_HOST=localhost
    DB_PORT=3306
    DB_DATABASE=your_db_name
    DB_USERNAME=your_db_user
    DB_PASSWORD=your_db_password
    ```
- **SQLite (optional):**
  - Create `database.sqlite` in `/laravel/database/`.
  - Update `.env`:
    ```env
    DB_CONNECTION=sqlite
    DB_DATABASE=/home/username/laravel/database/database.sqlite
    ```

## 6. Running Migrations
- **Connect via SSH** to your hosting account.
- Navigate to the `/laravel` directory:
  ```sh
  cd ~/laravel
  php artisan migrate --force
  ```
- (Optional) Seed the database:
  ```sh
  php artisan db:seed --force
  ```

## 7. File Permissions
- Ensure the following directories are writable:
  - `/laravel/storage`
  - `/laravel/bootstrap/cache`
- You can set permissions via SSH:
  ```sh
  chmod -R 775 storage bootstrap/cache
  ```

## 8. Artisan Commands & Cron Jobs
- **Set up Laravel scheduler:**
  - In Hostinger's control panel, add a cron job:
    ```sh
    /usr/bin/php /home/username/laravel/artisan schedule:run
    ```
  - Replace `username` with your actual account username.
- **Other useful commands:**
  - Clear caches:
    ```sh
    php artisan config:cache
    php artisan route:cache
    php artisan view:cache
    php artisan optimize
    ```

## 9. Troubleshooting & Best Practices
- **Common issues:**
  - 500 errors: Check file permissions, `.env` values, and error logs.
  - Database connection errors: Double-check credentials and `.env` paths.
  - Asset loading issues: Ensure assets are built and paths are correct.
- **Best practices:**
  - Never expose `.env` or sensitive files in `public_html`.
  - Use `APP_DEBUG=false` in production.
  - Regularly back up your database and files.
  - Use version control (git) for all deployments.
  - Test your deployment in a staging environment before production.

---

**For more details, see the [Hostinger deployment guide](https://support.hostinger.com/en/articles/6152127-how-to-deploy-laravel-8-at-hostinger).** 