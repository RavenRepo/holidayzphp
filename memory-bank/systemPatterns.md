# System Patterns - HolidayzPHP

## Architecture Overview
- Monorepo structure with separate frontend, admin, and API applications
- Shared packages for common functionality
- Component-based frontend architecture
- Service layer for external API integration and business logic

## Design Patterns
1. **Component Architecture**
   - Namespaced UI components (`x-ui.*`)
   - Hierarchical component organization
   - Consistent props and styling patterns
   - Component composition for complex UIs

2. **Package Structure**
   - Core package for fundamental functionality
   - Common package for shared utilities
   - Clear separation of concerns

3. **Frontend Architecture**
   - Blade templates with Tailwind CSS
   - Alpine.js for interactive functionality
   - Responsive design principles
   - Mobile-first approach

4. **Backend Architecture**
   - Laravel 10+ framework
   - RESTful API design
   - MySQL with UUID primary keys
   - Service layer pattern for external integrations

5. **Authentication & Authorization**
   - Laravel Breeze/Jetstream
   - Spatie roles and permissions
   - Laravel Socialite integration

6. **RBAC Implementation**
   - Spatie Laravel-Permission for role-based access control
   - UUID primary keys for all permission-related tables
   - Admin guard for admin/backend panel
   - Route middleware protection: `role:admin|manager`
   - Policy-based authorization for model actions
   - Permission seeder with explicit role/permission relationships

7. **Admin Panel Architecture**
   - Filament v3 as the admin panel framework
   - Official Filament theme for consistent UI
   - Resource-based CRUD operations
   - Panel provider configuration in `AdminPanelProvider.php`
   - Standard Tailwind configuration with required plugins
   - SPA mode for smoother navigation
   - Role-based access control integrated with Filament

8. **Service Layer Pattern**
   - Dedicated service classes for external API integrations
   - Fallback mechanisms for API failures
   - Consistent error handling
   - Environment-specific configurations
   - Configurable timeout settings
   - Interface-based design for mockability and testing

## Implementation Guidelines
1. **Component Creation**
   - Place in appropriate `/components/ui/[category]` directory
   - Use namespaced component naming: `x-ui.[category].[name]`
   - Include props validation and documentation
   - Follow accessibility best practices

2. **Component Categories**
   - `/layout`: Page structure components (app, header, footer, section)
   - `/forms`: Input elements and controls
   - `/cards`: Content display components
   - `/feedback`: User interaction feedback (alerts, modals)

3. **Component Props**
   - Use `@props` directive for prop definition
   - Provide default values where appropriate
   - Document expected prop types and formats
   - Use consistent prop naming across components

4. **Role & Permission Guidelines**
   - Route Protection: Use middleware `['auth', 'role:rolename']`
   - Controller Actions: Use `$this->authorize('ability', $model)`
   - Policies: Create per-model with well-defined permissions
   - Permission Naming: Consistent verb-noun format (e.g., `edit user`)
   - Role Assignment: Role-based, not direct permission assignment

5. **Package Development**
   - Maintain in `/packages` directory
   - Clear versioning
   - Comprehensive documentation

6. **Resource Management**
   - Shared resources in root `/resources`
   - App-specific resources in respective app directories
   - Clear asset organization

7. **Testing Strategy**
   - Unit tests for packages
   - Feature tests for applications
   - Integration tests for API
   - Policy tests for authorization
   - Mock-based tests for service layer

8. **Service Layer Implementation**
   - Create service classes in `app/Services` directory
   - Use dependency injection for configuration
   - Implement error handling and fallback mechanisms
   - Document expected behavior clearly
   - Separate data transformation from data fetching
   - Cache external data when appropriate