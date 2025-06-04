# NoRepeatFiles Registry: Holidayz Manager

This registry documents all files and directories in the Holidayz Manager monorepo codebase. Consult this file BEFORE creating any new files or directories.

## Root Directory (`d:\Projects files\holidayzphp`)

| Path                     | Type      | Description                                  | Imports/Exports | Relationships                     |
| ------------------------ | --------- | -------------------------------------------- | --------------- | --------------------------------- |
| `.gitignore`             | File      | Specifies intentionally untracked files      | N/A             | Git                               |
| `.windsurfrules`         | File      | Cascade user rules/memory bank definition    | N/A             | Cascade                           |
| `README.md`              | File      | Project overview and setup instructions      | N/A             | Project                           |
| `composer.json`          | File      | Root PHP dependencies & monorepo config      | N/A             | Composer, `packages/`, `apps/*` |
| `package.json`           | File      | Root JS dependencies (if needed globally)    | N/A             | NPM/Yarn, Vite/Mix              |
| `projectdetail.md`       | File      | Detailed project blueprint/specifications    | N/A             | Project Planning, Memory Bank     |
| `apps/`                  | Directory | Contains individual Laravel applications     | N/A             | `composer.json`, `packages/`    |
| `memory-bank/`           | Directory | Cline's Memory Bank documentation            | N/A             | Development Workflow              |
| `packages/`              | Directory | Shared PHP code/libraries                    | PSR-4 Autoload  | `composer.json`, `apps/*`       |
| `resources/`             | Directory | Shared resources (optional, e.g., assets)    | N/A             | Potentially `apps/*`              |
| `tests/`                 | Directory | Shared automated tests                       | PSR-4 Autoload  | PHPUnit/Pest, `apps/*`, `packages/*` |

## `apps/` Directory

| Path                        | Type      | Description                       | Imports/Exports | Relationships   |
| --------------------------- | --------- | --------------------------------- | --------------- | --------------- |
| `apps/admin/`               | Directory | Admin Panel (Standard Laravel)    | N/A             | `packages/`     |
| `apps/admin/app/Filament/`  | Directory | Filament admin panel resources    | N/A             | Filament        |
| `apps/admin/app/Filament/Pages/` | Directory | Filament pages | N/A | Filament |
| `apps/admin/app/Filament/Pages/Dashboard.php` | File | Admin dashboard page | BaseDashboard | Filament |
| `apps/admin/app/Filament/Resources/` | Directory | Filament resources | N/A | Filament |
| `apps/admin/app/Filament/Resources/RoleResource.php` | File | Role management resource | Role | Spatie Permission |
| `apps/admin/app/Filament/Resources/RoleResource/` | Directory | Role resource pages | N/A | Filament |
| `apps/admin/app/Filament/Resources/PermissionResource.php` | File | Permission management resource | Permission | Spatie Permission |
| `apps/admin/app/Filament/Resources/PermissionResource/` | Directory | Permission resource pages | N/A | Filament |
| `apps/admin/app/Filament/Resources/UserResource.php` | File | User management resource | User | Spatie Permission |
| `apps/admin/app/Filament/Resources/UserResource/` | Directory | User resource pages | N/A | Filament |
| `apps/admin/app/Http/Controllers/Auth/` | Directory | Auth controllers | N/A | Laravel Auth |
| `apps/admin/app/Http/Controllers/Auth/AdminLoginController.php` | File | Admin login controller | Auth | Laravel Auth |
| `apps/admin/app/Models/Admin.php` | File | Admin user model | FilamentUser | Filament, Spatie Permission |
| `apps/admin/app/Providers/AdminPanelProvider.php` | File | Filament admin panel configuration | PanelProvider | Filament |
| `apps/admin/database/migrations/2025_05_09_105805_create_admins_table.php` | File | Admins table migration | N/A | Database |
| `apps/admin/database/migrations/2025_05_13_191635_add_description_to_roles_table.php` | File | Adds description to roles | N/A | Spatie Permission |
| `apps/admin/database/migrations/2025_05_14_000000_add_fields_to_admins_table.php` | File | Adds fields for Filament auth | N/A | Filament |
| `apps/admin/database/seeders/RolePermissionSeeder.php` | File | Seeds roles and permissions | Role, Permission | Spatie Permission |
| `apps/admin/resources/css/filament/admin/theme.css` | File | Custom theme for Filament | N/A | Filament |
| `apps/frontend/`            | Directory | Public Website (Standard Laravel) | N/A             | `packages/`     |
| `apps/frontend/app/Services/UnsplashService.php` | File | Service for handling Unsplash API requests with fallbacks | Http | HomeController, external API |

## `packages/` Directory

| Path                   | Type      | Description                         | Imports/Exports | Relationships |
| ---------------------- | --------- | ----------------------------------- | --------------- | ------------- |
| `packages/.gitkeep`    | File      | Ensures directory tracking by Git | N/A             | Git           |
| `packages/Core/`                 | Directory | Shared Core components package        | N/A             | `composer.json` |
| `packages/Core/composer.json`    | File      | Package definition & autoloading    | PSR-4           | Composer, Spatie Permission |
| `packages/Core/src/`             | Directory | Source code for Core package        | N/A             | PHP Code        |
| `packages/Core/src/Database/`    | Directory | Database migrations and seeders     | N/A             | Database        |
| `packages/Core/src/Database/Migrations/` | Directory | Shared migrations | N/A | Database |
| `packages/Core/src/Database/Migrations/2024_05_06_000001_create_users_table.php` | File | UUID users table migration | N/A | Database |
| `packages/Core/src/Database/Migrations/2024_05_06_000002_create_permission_tables.php` | File | UUID permission tables migration | N/A | Spatie Permission |
| `packages/Core/src/Models/`      | Directory | Shared models                       | N/A             | PHP Code        |
| `packages/Core/src/Models/User.php` | File | Base user model with UUID and RBAC | HasRoles | Spatie Permission |
| `packages/Core/src/Providers/`   | Directory | Service providers                   | N/A             | Laravel        |
| `packages/Core/src/Providers/CoreServiceProvider.php` | File | Registers Core package services | PermissionServiceProvider | Spatie Permission |
| `packages/Core/src/Traits/`      | Directory | Shared Traits                       | N/A             | PHP Code        |
| `packages/Core/src/Traits/UsesUuid.php` | File | Trait for UUID primary keys | N/A | Models |

## `resources/` Directory

| Path                     | Type      | Description                         | Imports/Exports | Relationships |
| ------------------------ | --------- | ----------------------------------- | --------------- | ------------- |
| `resources/.gitkeep`     | File      | Ensures directory tracking by Git | N/A             | Git           |

## `tests/` Directory

| Path                   | Type      | Description                         | Imports/Exports | Relationships |
| ---------------------- | --------- | ----------------------------------- | --------------- | ------------- |
| `tests/.gitkeep`       | File      | Ensures directory tracking by Git | N/A             | Git           |

## `memory-bank/` Directory

| Path                          | Type | Description                                    | Imports/Exports | Relationships   |
| ----------------------------- | ---- | ---------------------------------------------- | --------------- | --------------- |
| `memory-bank/norepeatfiles.md`| File | This registry file                             | N/A             | Cline Workflow  |
| `memory-bank/projectbrief.md` | File | Core requirements and goals                    | N/A             | Cline Workflow  |
| `memory-bank/productContext.md`| File | Project purpose, problems solved, user goals | N/A             | Cline Workflow  |
| `memory-bank/systemPatterns.md`| File | Architecture, tech decisions, patterns       | N/A             | Cline Workflow  |
| `memory-bank/techContext.md`  | File | Technologies, setup, constraints             | N/A             | Cline Workflow  |
| `memory-bank/activeContext.md`| File | Current focus, next steps, decisions         | N/A             | Cline Workflow  |
| `memory-bank/progress.md`     | File | What works, what's left, status, issues      | N/A             | Cline Workflow  |
| `memory-bank/deployproduction.md` | File | Production deployment guide for Laravel monorepo (Hostinger) | N/A | Deployment, DevOps |


# File and Directory Registry

## Frontend Application
- `/apps/frontend/resources/views/components/ui/`
  - `/layout/`
    - `app.blade.php`: Main layout component with header and footer
    - `header.blade.php`: Main navigation header component
    - `footer.blade.php`: Site-wide footer component
    - `page-heading.blade.php`: Reusable page heading with optional subtitle
    - `section.blade.php`: Container section with background and padding options
  - `/forms/`
    - `button.blade.php`: Button component with variants and sizes
    - `input.blade.php`: Input field with label and error handling
  - `/feedback/`
    - `alert.blade.php`: Alert component with multiple types (info, success, warning, error) and dismissible options
    - `modal.blade.php`: Accessible modal dialog with customizable width, header, footer, and close functionality
  - `/cards/`: Card components (to be implemented)
  - `/carousel/`
    - `slick.blade.php`: Highly configurable Slick Carousel component using CDN for scripts and styles
    - `slide.blade.php`: Standardized slide component for use within the Slick Carousel
    - `demo.blade.php`: Demo page showing carousel component usage with examples
  - `/apps/frontend/resources/views/components/home/`
    - `hero-carousel.blade.php`: Hero carousel component for homepage
    - `popular-packages.blade.php`: Component for displaying popular travel packages
    - `why-choose-us.blade.php`: Component showcasing company features and benefits
    - `testimonials.blade.php`: Customer testimonials slider component
    - `blog-inspirations.blade.php`: Travel blog and inspiration articles section
    - `cta-section.blade.php`: Call to action section with promotional content
    - `lead-form.blade.php`: Lead capture form for customer information
    - `benefits-section.blade.php`: Benefits showcase section for homepage
    - `visa-free-destinations.blade.php`: Visa-free destinations grid for homepage
- `/apps/frontend/app/Providers/`
  - `AppServiceProvider.php`: Service provider for bootstrapping the application
  - `ViewServiceProvider.php`: Service provider for registering view components
- `/apps/frontend/resources/views/`
  - `welcome.blade.php`: Homepage view using UI layout components
  - `home.blade.php`: New visually appealing homepage with multiple sections
  - `components/demo.blade.php`: Demonstration page for UI components with usage examples
- `/apps/frontend/resources/views/components/package-card.blade.php`: Blade component for displaying a single travel package card. Used by packages/index.blade.php. Imports: Tailwind classes, uses props for package data.
- `/apps/frontend/resources/views/packages/index.blade.php`: Main package listing page. Extends layouts/app.blade.php. Uses: x-package-card component for each package.
- `/apps/frontend/app/Http/Controllers/HomeController.php`: Controller for the homepage that provides destination data and fetches images from UnsplashService. Renders home.blade.php with data for carousel, destinations, and other sections.
- `/apps/frontend/app/Services/UnsplashService.php`: Service for searching and retrieving images from Unsplash API, with increased timeout settings and fallback placeholder images.

## Admin Application
- `/apps/admin/resources/views/`
  - `welcome.blade.php`: Admin dashboard landing page
  - `filament/dashboard.blade.php`: Filament admin dashboard view
- `/apps/admin/routes/`
  - `web.php`: Main admin routes
  - `auth.php`: Authentication routes
  - `filament.php`: Filament admin dashboard routes

## Shared Resources
- `/resources/css/`
  - `global.css`: Global styles shared across applications
- `/resources/design-system/`
  - `theme-documentation.md`: Design system documentation

## Packages
- `/packages/Core/`
  - `src/Traits/UsesUuid.php`: UUID implementation for models
- `/packages/Common/`
  - Ready for shared functionality

## Configuration Files
- `/composer.json`: Root dependencies
- `/package.json`: Root JS dependencies
- `/apps/frontend/composer.json`: Frontend app dependencies
- `/apps/admin/composer.json`: Admin app dependencies

## Documentation
- `/memory-bank/`
  - [activeContext.md](cci:7://file:///d:/Projects%20files/holidayzphp/memory-bank/activeContext.md:0:0-0:0): Current project state and decisions
  - [progress.md](cci:7://file:///d:/Projects%20files/holidayzphp/memory-bank/progress.md:0:0-0:0): Project progress tracking
  - `norepeatfiles.md`: File registry (this file)
  - `projectbrief.md`: Project overview
  - `systemPatterns.md`: Architecture patterns
  - `techContext.md`: Technical context
  - `productContext.md`: Product context
- `/design-system.md`: Design system documentation

## Data Flow
1. Frontend components use shared resources from `/resources/`
2. Both frontend and admin apps use packages from `/packages/`
3. Shared CSS and design system ensure consistent styling
4. External API services (like Unsplash) are accessed through service classes with proper error handling and fallbacks

## New Entries
| Path | Type | Description | Imports/Exports | Relationships |
| ---------------------- | --------- | ----------------------------------- | --------------- | ------------- |
| `/apps/frontend/app/Http/Controllers/DashboardController.php` | File | User dashboard controller (frontend) | Returns dashboard view, uses Auth | Used by `/dashboard` route, passes user/profile/bookings |
| `/apps/frontend/app/Http/Controllers/ManagerDashboardController.php` | File | Manager dashboard controller (frontend) | Returns manager dashboard view, uses Auth | Used by `/manager/dashboard` route, passes user/teamMembers/teamBookings |
| `/apps/frontend/resources/views/dashboard.blade.php` | File | User dashboard Blade view | Extends layouts/app, uses Tailwind | Used by DashboardController, shown at `/dashboard` |
| `/apps/frontend/resources/views/manager/dashboard.blade.php` | File | Manager dashboard Blade view | Extends layouts/app, uses Tailwind | Used by ManagerDashboardController, shown at `/manager/dashboard` |
| `/apps/frontend/resources/views/components/dashboard/bookings-widget.blade.php` | File | Bookings widget Blade component | Accepts bookings prop, shows table or empty state | Used in user and manager dashboards |
| `/apps/frontend/resources/views/components/dashboard/profile-widget.blade.php` | File | Profile widget Blade component | Accepts profile prop, shows user info | Used in user dashboard |
| `/apps/frontend/resources/views/components/dashboard/team-stats-widget.blade.php` | File | Team stats widget Blade component | Accepts teamMembers and teamBookings props, shows stats and list | Used in manager dashboard |
| `apps/admin/app/Providers/AdminPanelProvider.php` | File | Filament v3 PanelProvider for admin panel configuration | Registers Filament panel, navigation, widgets, hooks | Used in config/app.php, replaces FilamentServiceProvider |
| `apps/frontend/app/Services/UnsplashService.php` | File | Service for Unsplash API image search | Uses Laravel HTTP client, temporarily disables SSL verification for local dev, increased timeout, fallback images | Used by HomeController, DestinationsController |
| `/apps/admin/app/Http/Controllers/Auth/AdminForgotPasswordController.php` | File | Admin forgot password controller (shows form, sends reset link) | Uses Password broker, returns Blade view | Used by `/admin/siteadmin/forgot-password` route |
| `/apps/admin/app/Http/Controllers/Auth/AdminResetPasswordController.php` | File | Admin reset password controller (shows form, handles reset) | Uses Password broker, returns Blade view | Used by `/admin/siteadmin/reset-password/{token}` route |
| `/apps/admin/resources/views/auth/admin-forgot-password.blade.php` | File | Admin forgot password Blade view | Extends layouts/app, uses Tailwind | Used by AdminForgotPasswordController |
| `/apps/admin/resources/views/auth/admin-reset-password.blade.php` | File | Admin reset password Blade view | Extends layouts/app, uses Tailwind | Used by AdminResetPasswordController |
| `/apps/admin/database/migrations/2025_05_09_105805_create_admins_table.php` | File | Migration for the admins table. Now includes id, email, password, timestamps. Used by the admin guard for authentication (see config/auth.php). Related to App\Models\Admin. | N/A | Migration |
| `/apps/frontend/app/Http/Controllers/Auth/RegisterController.php` | File | User registration controller | Creates new users, assigns 'user' role, validates terms | Used by `/register` route, interacts with User model |
| `/apps/frontend/resources/views/auth/register.blade.php` | File | User registration form view | Extends layouts/app, includes terms validation | Used by RegisterController, shown at `/register` |
| `/apps/frontend/app/Http/Controllers/Auth/LoginController.php` | File | User login controller | Handles authentication with web guard | Used by `/login` route, redirects to dashboard |
| `/apps/frontend/resources/views/auth/login.blade.php` | File | User login form view | Extends layouts/app, includes remember me | Used by LoginController, shown at `/login` |
| `/apps/frontend/app/Http/Controllers/Auth/ForgotPasswordController.php` | File | Password reset request controller | Sends reset link email | Used by `/forgot-password` route |
| `/apps/frontend/app/Http/Controllers/Auth/ResetPasswordController.php` | File | Password reset controller | Handles password reset with token | Used by `/reset-password/{token}` route |
| `/apps/frontend/resources/views/auth/forgot-password.blade.php` | File | Forgot password form view | Extends layouts/app, requests email | Used by ForgotPasswordController |
| `/apps/frontend/resources/views/auth/reset-password.blade.php` | File | Reset password form view | Extends layouts/app, accepts new password | Used by ResetPasswordController |
| `/apps/frontend/resources/views/package-details.blade.php` | File | Detailed view of individual travel package | Extends layouts/app, uses package components | Shows package details, gallery, overview, etc. |