# RBAC Implementation Plan – HolidayzPHP

## Overview
A phased roadmap for building a secure and maintainable Role-Based Access Control system using Spatie Laravel-Permission and UUIDs.

---

### Phase 0 – Foundations ✅
- Unified users table to use UUIDs
- All foreign keys converted to UUIDs
- `User` model uses `HasRoles` trait and UUIDs
- `config/permission.php` guard set to `admin`
- Role/permission seeder with explicit UUIDs
- Spatie permission tables migrated with UUID primary keys

### Phase 1 – Route Protection ✅
- Wrap all admin routes with `middleware(['auth','role:admin|manager'])`
- Protect Filament admin panel routes the same way
- Deliverable: Only `admin` & `manager` roles reach `/admin/*`

### Phase 2 – Policies & Controller Authorisation ✅
- Generate `UserPolicy`, `PackagePolicy`, `BlogPolicy`
- Register policies in `AuthServiceProvider`
- Add controller / Blade authorisation using `authorize()` & `@can`
- Added `Gate::before` for admin superuser privileges

### Phase 3 – Seeder & Cache Hardening ✅
- Guard table truncation to `local` & `testing` envs
- Clear permission cache after seeding (`PermissionRegistrar`)

### Phase 4 – Automated Tests ✅
- Feature tests for route protection ✅
- Unit tests for policies ✅
- Documented in `systemPatterns.md` ✅
- Known issue: Some policy tests currently fail (will be fixed in Phase 8)

### Phase 5 – Admin UI Management (Filament) ✅
- Scaffolded `UserResource`, `RoleResource`, `PermissionResource`
- Created necessary page classes for each resource
- Added `FilamentServiceProvider` to lock access behind role middleware
- Redirected `/dashboard` to `/admin` Filament panel
- Known issue: Some type warnings due to Filament installation

### Phase 6 – Multi-Guard Strategy 
- Added `web` guard to Spatie config for frontend roles/permissions
- Ensured guard resolution in models / Spatie middleware
- Integrated Filament admin panel with admin guard
- Fixed authentication issues between custom admin login and Filament

### Phase 7 – Documentation & Deployment (IN PROGRESS)
- Updated memory bank documentation with RBAC implementation details
- Documented Filament integration with admin guard
- Record middleware & policy patterns in `systemPatterns.md`
- Add `php artisan permission:cache-reset` to deploy pipeline

### Phase 8 – Testing & Bug Fixes (PLANNED)
- Fix failing policy tests (mock object issues)
- Expand test coverage to 80%+ 
- Add integration tests with actual database connections
- Fix Filament type warnings

---

## Current Focus
Complete **Phase 7 – Documentation & Deployment** and prepare for **Phase 8 – Testing & Bug Fixes**.

## Next Steps
1. Complete documentation of middleware & policy patterns
2. Add permission cache reset to deployment pipeline
3. Begin comprehensive testing of RBAC implementation
4. Fix any remaining Filament integration issues

# RBAC Implementation Plan - HolidayzPHP

This document outlines the step-by-step plan for implementing and auditing the Role-Based Access Control (RBAC) system using Spatie Laravel Permission, UUIDs, and best practices. Each step includes rationale and actionable tasks.

---

## 1. Unify User Table to Use UUIDs
- **Status:** Implemented
- **Notes:** Admin app's integer PK users migration commented out. Core package migration (UUID PK) is used everywhere.

## 2. Ensure All Foreign Keys Use UUIDs
- **Status:** Implemented
- **Notes:** All user-related foreign keys use UUIDs. No business domain tables present yet.

## 3. Confirm User Model Uses HasRoles Trait and UUIDs
- **Status:** Implemented
- **Notes:** Core User model uses HasRoles, UUIDs, and auto-generates UUIDs on create. Admin User model extends Core User.

## 4. Check config/permission.php for Correct Guard
- **Status:** Implemented
- **Notes:** 'guard_name' set to 'admin' in config/permission.php.

## 5. Add/Verify Role and Permission Seeder
- **Status:** Implemented
- **Notes:** RolePermissionSeeder created to seed roles, permissions, and assign admin role to first user. DatabaseSeeder calls this seeder.

## 6. Protect All Admin Routes with role: or permission: Middleware
- **Rationale:** Enforces access control at the route/controller level.
- **Tasks:**
  - Add `role:` or `permission:` middleware to all sensitive admin routes.
- **Status:** Implemented
- **Notes:** All admin routes protected with `role:admin|manager` middleware. Filament admin panel protected with admin guard.

## 7. Add/Verify Policies for Business Models
- **Rationale:** Enables fine-grained access control for models (e.g., Package, Blog).
- **Tasks:**
  - Create and register policies in AuthServiceProvider.
- **Status:** Implemented
- **Notes:** Policies created for User, Role, and Permission models. Filament resources use these policies for authorization.

## 8. Add Feature Tests for RBAC Enforcement
- **Rationale:** Ensures the RBAC system works as intended and prevents regressions.
- **Tasks:**
  - Write feature tests for role/permission enforcement on routes and actions.
- **Status:** In Progress
- **Notes:** Basic tests implemented, comprehensive test suite planned for Phase 8.

## 9. Filament Admin Panel Integration
- **Rationale:** Provides a user-friendly interface for managing roles and permissions.
- **Tasks:**
  - Create Filament resources for Role and Permission models.
  - Configure Filament to use the admin guard.
  - Implement role and permission management UI.
- **Status:** ✅ Implemented
- **Notes:** Filament resources created for Role, Permission, and User models. Custom theme applied to match design system.

---

_Updated: 2025-05-14T01:09:13+05:30_ 