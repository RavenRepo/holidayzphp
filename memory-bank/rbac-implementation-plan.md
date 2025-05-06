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