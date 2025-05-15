# Tech Context: Holidayz Manager

## Technologies Used

### Backend
- **Framework:** PHP (^8.2), Laravel (10+ LTS)
- **Database:** MySQL (InnoDB)
- **Package Manager:** Composer (PHP)

### Frontend
- **Template Engine:** Blade
- **CSS Framework:** Tailwind CSS
- **JavaScript:** Alpine.js
- **Build Tool:** Vite

### Authentication
- **Guards:**
  - Admin Guard (session-based)
  - Web Guard (for frontend)
- **Middleware:**
  - Custom admin authentication
  - Role-based access control

### Key Libraries/Packages
- **RBAC:**
  - Spatie Laravel Permission (^6.0)
  - UUID support via ramsey/uuid
- **Admin Panel:**
  - Filament v3 (admin panel framework)
  - Official Filament theme
  - Tailwind plugins (@tailwindcss/forms, @tailwindcss/typography)
- **Logging:**
  - Spatie Activitylog
- **Authentication:**
  - Custom implementation with Laravel's built-in auth
  - Filament authentication integration
- **Future Integrations:**
  - Laravel Scout (for search)
  - Laravel Socialite (social login)

## Development Setup

### Environment
- **Local Development:**
  - PHP 8.2+
  - MySQL 8.0+
  - Node.js 18+
  - Composer 2+

### Project Structure
- **Monorepo Setup:**
  - `/apps/admin` - Admin application
  - `/apps/frontend` - Frontend application
  - `/packages/Core` - Shared core package

### Version Control
- **Git:**
  - Feature branches
  - Monorepo structure
  - Shared components in packages

## Technical Constraints

### Hosting
- **Platform:** Hostinger shared hosting
- **Limitations:**
  - Resource constraints
  - Background process limits
  - Deployment via SFTP/Git

### Database
- **Engine:** MySQL (InnoDB)
- **Features:**
  - UUID primary keys
  - Foreign key constraints
  - Index optimization

## Dependencies

### PHP Packages
- **Core:**
  - Laravel Framework
  - Spatie Permission
  - Ramsey UUID
- **Development:**
  - Laravel Sail
  - PHP CS Fixer
  - PHPUnit

### JavaScript
- **Build:**
  - Vite
  - PostCSS
  - Tailwind CSS
- **Frontend:**
  - Alpine.js
  - Axios

### Local Packages
- Managed via Composer path repositories
- Shared code in Core package
- Cross-application utilities

## Tool Usage Patterns

### Development Workflow
1. Local development using PHP's built-in server
2. Database migrations with UUID support
3. Role-based access control implementation
4. View component development with Blade

### Testing Strategy
1. Feature tests for authentication
2. Unit tests for RBAC
3. Integration tests for guards
4. Browser tests for UI flows

### Deployment Process
1. Build frontend assets
2. Run database migrations
3. Clear cache and optimize
4. Deploy via SFTP/Git

- `composer install` at root level.
- `npm install` / `npm run dev/build` potentially run within each `apps/*` directory or configured globally.
- Laravel Artisan commands (`migrate`, `cache:clear`, etc.) run within specific `apps/*` directories.
