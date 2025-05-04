# Active Context: Holidayz Manager (Initial Setup)

*(Updated: 2025-05-05T01:32:30+05:30 approx)*

## Current Work Focus

- Initializing the monorepo structure.
- Setting up core Memory Bank documentation files as per Cline's workflow.
- Preparing to install the individual Laravel applications (`frontend`, `admin`).
- Installing the `admin` Laravel application.
- Configuring initial shared packages and basic application setup (linking packages, environment variables).

## Recent Changes

- Created base directories: `apps/`, `packages/`, `resources/`, `tests/`, `memory-bank/`.
- Added subdirectories: `apps/admin/`, `apps/frontend/`.
- Created root `.gitignore`.
- Confirmed/updated root `composer.json` with PSR-4 autoloading and path repositories for `packages/*`.
- Created initial Memory Bank files (`projectbrief.md`, `productContext.md`, `systemPatterns.md`, `techContext.md`, `norepeatfiles.md`, `activeContext.md`, `progress.md`).
- Updated `norepeatfiles.md` with initial structure.
- Installed Laravel framework into `apps/frontend`.
- Updated `norepeatfiles.md` to reflect `apps/frontend` installation.
- Updated `activeContext.md` and `progress.md`.
- Installed Laravel framework into `apps/admin`.
- Updated `norepeatfiles.md` to reflect `apps/admin` installation.
- Created `packages/Core` directory.
- Created `packages/Core/composer.json` with PSR-4 autoloading.
- Created `packages/Core/src` directory.
- Updated `norepeatfiles.md`.
- Created `packages/Core/src/Traits` directory.
- Created `packages/Core/src/Traits/UsesUuid.php`.
- Updated `norepeatfiles.md`.

## Next Steps

1. Update `progress.md`.
2. Configure `apps/frontend/composer.json` and `apps/admin/composer.json` to require the `holidayz/core` package.
3. Run `composer update` in the root directory to link everything.
4. Set up basic `.env` files for `frontend` and `admin` apps.

## Active Decisions & Considerations

- Confirmed `d:\Projects files\holidayzphp` is the monorepo root.
- Redundant `holidayz-manager-monorepo` subdirectory confirmed not to exist.
- Using separate `.env` files per application in `apps/`.
- Views will be app-specific (`apps/*/resources/views`).
- API routes will initially live within `apps/frontend/routes/api.php`.
- Consider abstracting shared UI components/config (Tailwind, Vite) into `packages/UI` or `resources/` later.

## Important Patterns & Preferences

- Adhere strictly to Cline's Memory Bank workflow (Read all files, Plan, Act, Document).
- Consult `norepeatfiles.md` before creating any new file/directory.
- Keep Memory Bank files updated after significant changes or discoveries.

## Learnings & Insights

- `edit_file` tool encountered persistent "target edited after diff was generated" errors with `composer.json`, requiring manual update by the user.
- `composer create-project` requires the target directory to be non-existent, necessitating removal of directories containing only `.gitkeep` files or existing installations (using `Remove-Item -Recurse -Force`).
- User confirmation/cancellation of commands can interrupt workflow; need to re-initiate or confirm status.
