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

### Phase 6 – Multi-Guard Strategy (PLANNED)
- Add `web` guard to Spatie config if frontend requires roles/permissions
- Ensure guard resolution in models / Spatie middleware

### Phase 7 – Documentation & Deployment (PLANNED)
- Record middleware & policy patterns in `systemPatterns.md`
- Add `php artisan permission:cache-reset` to deploy pipeline

### Phase 8 – Testing & Bug Fixes (PLANNED)
- Fix failing policy tests (mock object issues)
- Expand test coverage to 80%+ 
- Add integration tests with actual database connections
- Fix Filament type warnings

---

## Current Focus
Begin **Phase 6 – Multi-Guard Strategy**.

## Next Steps
1. Evaluate frontend needs for role-based authorization
2. Extend permission config to support web guard
3. Test guard resolution in models with two guards

# RBAC Implementation Plan - HolidayzPHP

This document outlines the step-by-step plan for implementing and auditing the Role-Based Access Control (RBAC) system using Spatie Laravel Permission, UUIDs, and best practices. Each step includes rationale and actionable tasks.

---

## 1. Unify User Table to Use UUIDs
- **Status:** ✅ Implemented
- **Notes:** Admin app's integer PK users migration commented out. Core package migration (UUID PK) is used everywhere.

## 2. Ensure All Foreign Keys Use UUIDs
- **Status:** ✅ Implemented
- **Notes:** All user-related foreign keys use UUIDs. No business domain tables present yet.

## 3. Confirm User Model Uses HasRoles Trait and UUIDs
- **Status:** ✅ Implemented
- **Notes:** Core User model uses HasRoles, UUIDs, and auto-generates UUIDs on create. Admin User model extends Core User.

## 4. Check config/permission.php for Correct Guard
- **Status:** ✅ Implemented
- **Notes:** 'guard_name' set to 'admin' in config/permission.php.

## 5. Add/Verify Role and Permission Seeder
- **Status:** ✅ Implemented
- **Notes:** RolePermissionSeeder created to seed roles, permissions, and assign admin role to first user. DatabaseSeeder calls this seeder.

## 6. Protect All Admin Routes with role: or permission: Middleware
- **Rationale:** Enforces access control at the route/controller level.
- **Tasks:**
  - Add `role:` or `permission:` middleware to all sensitive admin routes.
- **Status:** ⏳ Next step

## 7. Add/Verify Policies for Business Models
- **Rationale:** Enables fine-grained access control for models (e.g., Package, Blog).
- **Tasks:**
  - Create and register policies in AuthServiceProvider.

## 8. Add Feature Tests for RBAC Enforcement
- **Rationale:** Ensures the RBAC system works as intended and prevents regressions.
- **Tasks:**
  - Write feature tests for role/permission enforcement on routes and actions.

---

_This plan will be updated as progress is made or requirements change._ 