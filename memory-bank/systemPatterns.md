# System Patterns - HolidayzPHP

## Architecture Overview
- Monorepo structure with separate frontend, admin, and API applications
- Shared packages for common functionality
- Component-based frontend architecture

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

4. **Backend Architecture**
   - Laravel 10+ framework
   - RESTful API design
   - MySQL with UUID primary keys

5. **Authentication & Authorization**
   - Laravel Breeze/Jetstream
   - Spatie roles and permissions
   - Laravel Socialite integration

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

2. **Package Development**
   - Maintain in `/packages` directory
   - Clear versioning
   - Comprehensive documentation

3. **Resource Management**
   - Shared resources in root `/resources`
   - App-specific resources in respective app directories
   - Clear asset organization

4. **Testing Strategy**
   - Unit tests for packages
   - Feature tests for applications
   - Integration tests for API