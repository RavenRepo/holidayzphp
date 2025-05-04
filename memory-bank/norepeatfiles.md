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
| `apps/frontend/`            | Directory | Public Website (Standard Laravel) | N/A             | `packages/`     |

## `packages/` Directory

| Path                   | Type      | Description                         | Imports/Exports | Relationships |
| ---------------------- | --------- | ----------------------------------- | --------------- | ------------- |
| `packages/.gitkeep`    | File      | Ensures directory tracking by Git | N/A             | Git           |
| `packages/Core/`                 | Directory | Shared Core components package        | N/A             | `composer.json` |
| `packages/Core/composer.json`    | File      | Package definition & autoloading    | PSR-4           | Composer        |
| `packages/Core/src/`             | Directory | Source code for Core package        | N/A             | PHP Code        |
| `packages/Core/src/Traits/`        | Directory | Shared Traits                       | N/A             | PHP Code        |
| `packages/Core/src/Traits/UsesUuid.php` | File      | Trait for UUID primary keys         | N/A             | Models          |

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
