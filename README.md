# Holidayz Manager Monorepo

A scalable Laravel monorepo for travel management, replicating and extending holidaytribe.com functionality.

## Brand Identity

- **Name:** Holidayz Manager
- **Colors:** Primary Blue (#0056B3), Saffron Accent (#FF9933)
- **Fonts:** Poppins (Headings), Open Sans (Body)

## Structure

- `apps/` – Main applications
    - `frontend/` - Public-facing Laravel app (Blade, Tailwind, Alpine.js)
    - `admin/` - Admin dashboard Laravel app (Blade, Tailwind)
    - `api/` - API-only Laravel app (for mobile/3rd-party)
- `packages/` – Shared business logic (Booking, Itinerary, Auth Utils, etc.)
- `modules/` – Optional feature modules (e.g., Spatie, custom DDD modules)
- `resources/` – Shared assets (fonts, images, global styles)
- `tests/` – Shared and app-specific tests (Unit, Integration, E2E)

## Setup

1.  **Clone:** `git clone <repo-url> holidayz-manager-monorepo`
2.  **Install PHP Dependencies:** `composer install` (from root)
3.  **Install JS Dependencies:** `npm install` (from root)
4.  **Configure Environment:** Copy `.env.example` to `.env` in each app (`apps/frontend`, `apps/admin`, `apps/api`). Update database credentials, mail settings, etc.
5.  **Generate App Keys:** Run `php artisan key:generate` in each app directory.
6.  **Run Migrations:** Run `php artisan migrate` in each app directory.
7.  **Link Storage:** Run `php artisan storage:link` in `apps/frontend` and `apps/admin`.
8.  **Build Assets:** `npm run dev` (for development) or `npm run build` (for production).

## Development Workflow

- **Local Environment:** Use Laravel Sail or Docker for consistency.
- **Branching:**
    - `main`: Production-ready code.
    - `dev`: Development and staging.
    - `feature/<feature-name>`: Individual features (e.g., `feature/itinerary-builder`).
- **Commits:** Follow Conventional Commits format (`feat:`, `fix:`, `docs:`, `refactor:`, etc.).
- **Pull Requests:** Require code reviews. Use PR templates.

## Key Technologies

- **Backend:** Laravel (Latest LTS)
- **Frontend:** Blade, Tailwind CSS, Alpine.js
- **Database:** MySQL (InnoDB) with UUIDs
- **Testing:** PHPUnit, Pest (optional), Cypress/Playwright (E2E)
- **CI/CD:** GitHub Actions (or similar)
- **Packages:** Spatie (Permissions, Activity Log, etc.), Laravel Socialite

## Contribution

- Follow code quality standards (PSR-12, SOLID).
- Write unit and integration tests (aim for >80% coverage).
- Document code using DocBlocks and update READMEs/wiki.
- Ensure UI follows brand guidelines and WCAG accessibility standards.

## Admin Authentication Flow

- **Login:**
  - URL: `/admin/siteadmin`
  - Controller: `AdminLoginController`
  - View: `auth/admin-login.blade.php`
- **Password Reset:**
  - Forgot Password: `/admin/siteadmin/forgot-password`
    - Controller: `AdminForgotPasswordController`
    - View: `auth/admin-forgot-password.blade.php`
  - Reset Password: `/admin/siteadmin/reset-password/{token}`
    - Controller: `AdminResetPasswordController`
    - View: `auth/admin-reset-password.blade.php`
- **Dashboard:**
  - URL: `/admin/dashboard`
  - Controller: `AdminDashboardController`
  - View: `admin/dashboard.blade.php`
- **Logout:**
  - URL: `/admin/logout` (POST)
  - Controller: `AdminLoginController`

All routes are protected by the `admin` guard. Password reset uses the same user provider as login. See Memory Bank for full file registry and relationships. 