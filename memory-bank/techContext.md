# Tech Context: Holidayz Manager

*(To be populated and updated)*

## Technologies Used

- **Backend:** PHP (^8.2), Laravel (10+ LTS)
- **Frontend:** HTML, CSS, JavaScript, Blade, Tailwind CSS, Alpine.js
- **Database:** MySQL (InnoDB)
- **Package Manager:** Composer (PHP), NPM/Yarn (JS - via Laravel Mix/Vite)
- **Key Libraries/Packages:**
  - Spatie Laravel Permission
  - Spatie Activitylog
  - Laravel Breeze/Jetstream (for auth scaffolding)
  - Laravel Socialite (for social login)
  - Laravel Scout (potentially for search)

## Development Setup

- **Environment:** Laravel Sail or Docker recommended for consistency.
- **Version Control:** Git (Monorepo setup).
- **IDE:** (User's choice - VS Code, PhpStorm etc.)

## Technical Constraints

- **Hosting:** Hostinger shared hosting (implies limitations on resources, background processes, potentially deployment methods - SFTP/Git).
- **Database:** MySQL (as specified).

## Dependencies

- Managed via root `composer.json` and `package.json`.
- Shared local packages managed via Composer path repositories.

## Tool Usage Patterns

- `composer install` at root level.
- `npm install` / `npm run dev/build` potentially run within each `apps/*` directory or configured globally.
- Laravel Artisan commands (`migrate`, `cache:clear`, etc.) run within specific `apps/*` directories.
