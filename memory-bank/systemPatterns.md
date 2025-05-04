# System Patterns: Holidayz Manager

*(To be populated as patterns emerge)*

## System Architecture

- **Monorepo:** Single Git repository housing multiple applications (`apps/`) and shared code (`packages/`).
  - `apps/frontend`: Public Laravel application.
  - `apps/admin`: Admin Laravel application.
  - `apps/api`: (Potential) API application/routes.
- **Layered Architecture (within Laravel apps):** Standard MVC pattern expected.

## Key Technical Decisions

- Use Laravel (latest LTS) as the core backend framework.
- Employ Blade templating with Tailwind CSS and Alpine.js for the frontend.
- Use MySQL with UUIDs for primary keys in main tables.
- Leverage Spatie packages for Roles/Permissions and Activity Logging.
- Utilize Composer path repositories for managing shared local `packages`.

## Design Patterns in Use

- Model-View-Controller (MVC) - inherent in Laravel.
- Repository Pattern (Potentially for data access abstraction).
- Service Layer (Potentially for complex business logic).
- Dependency Injection (Laravel service container).

## Component Relationships

- `apps/*` applications depend on shared code in `packages/*`.
- Shared `packages` encapsulate core domain logic (Booking, Itinerary, Models).
- Frontend and Admin apps interact with the same database schema.

## Critical Implementation Paths

- Authentication and Authorization (Roles/Permissions).
- Package management CRUD and display.
- Booking workflow.
- Itinerary builder logic and UI.
- Shared package development and integration.
