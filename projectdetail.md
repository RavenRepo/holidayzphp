Holidayz Manager – Laravel Monorepo Blueprint
A complete Laravel-based travel platform replicating holidaytribe.com features. Built as a monorepo to host multiple applications (front-end site, admin panel, API) in one repository, using Laravel (latest LTS) and Blade templates. The design follows the Holidayz Manager brand (Blue & Saffron colors, Open Sans & Poppins fonts) with a modern, responsive UI (Tailwind CSS + Alpine.js) and a MySQL database (UUIDs for keys). It supports travel packages, bookings, a blog, search/filters, and a dynamic itinerary builder. The architecture ensures scalability, maintainability, and secure role-based access control.
Brand Identity
Name: Holidayz Manager (holidayz-manager.com).
Colors: Primary Blue (e.g. #0056B3 for buttons/navbars) and Saffron/Orange (#FF9933) as accent. Use these in Tailwind config:
js
Copy
Edit
// tailwind.config.js
module.exports = {
  theme: {
    extend: {
      colors: {
        brandblue: '#0056B3',
        saffron:  '#FF9933',
      }
    }
  }
}
Typography: Headings in Poppins, body text in Open Sans (import via Google Fonts in <head>). These fonts ensure a clean, approachable look.
UI Components: Buttons, links, and highlights use brand colors (e.g. a “Book Now” button in saffron on blue). Maintain consistent spacing/rounding via Tailwind utility classes.
UI Element	Color / Font	Usage
Primary Background	Brand Blue (#0056B3)	Header, footer backgrounds
Accent / Buttons	Saffron (#FF9933)	Buttons, call-to-action highlights
Headings	Poppins	Fonts for titles and section headers
Body Text	Open Sans	Readable body paragraphs and labels

Technical Architecture
Monorepo Structure: Use a single Git repository with separate directories for each app/service and shared code. For example:
graphql
Copy
Edit
holidayz-manager-monorepo/
├─ apps/
│   ├─ frontend/      # Laravel app for public site (Blade templates)
│   ├─ admin/         # Laravel app for admin dashboard (Blade)
│   └─ api/           # Laravel app or routes for mobile/API
├─ packages/         # Shared PHP packages (Booking, Itinerary, Common Utils)
├─ modules/          # (Optional) Laravel modules (e.g., Spatie packages, feature modules)
├─ resources/        # Shared resources (views, assets)
├─ tests/            # Shared automated tests
├─ composer.json
└─ package.json
This enables shared models and logic (for example, the “Booking” or “Itinerary” model used by both front and admin) and unified CI/CD. Laravel’s modular design makes it well-suited for this setup
jewelhuq.medium.com
. Each “app” directory is a complete Laravel project, while common code lives in packages/ (loaded via Composer path or autoload).
Backend (Laravel): Latest LTS (Laravel 10+). Use PSR-4 structure for code. Employ Laravel Sail or Docker for local dev to mirror production (avoid “works on my machine” issues)
jewelhuq.medium.com
. Use environment configuration (.env) for hostinger settings (shared MySQL, mail, etc).
Database: MySQL (InnoDB) with UUID primary keys for all main tables (via use Illuminate\Support\Str; in models). UUIDs prevent ID enumeration attacks and support horizontal scaling/merging of data
dev.to
dev.to
. For example:
php
Copy
Edit
// In a migration:
$table->uuid('id')->primary();
and in Eloquent models:
php
Copy
Edit
protected $keyType = 'string';
public $incrementing = false;
Development Workflow: Use Composer and NPM in the monorepo root. Run composer install to set up all Laravel apps. Each app may have its own .env for DB credentials. Leverage Laravel’s package auto-discovery for shared packages. Use Git branches per feature and unified version control. For scalability, document clear boundaries between packages and apps
jewelhuq.medium.com
jewelhuq.medium.com
.
Hosting (Hostinger): Shared hosting (likely cPanel/Apache). Deploy the monorepo by uploading code via Git (if supported) or SFTP. Optimize for limited resources: enable PHP opcache, use php artisan config:cache, route:cache, and view:cache. Minimize on-the-fly compilation. Use shared storage for assets (storage/app/public symlinked to public/storage). Schedule Laravel’s scheduler via cron if allowed. Monitor logs and database size.
Database Schema (MySQL with UUIDs)
Define core tables (all id are UUIDs unless noted). Relations use UUID FKs.
Table	Key Columns (UUID PK)	Relationships / Notes
users	id, name, email, password, email_verified_at, phone	Stores site users. Implements MustVerifyEmail (Laravel) for email verification
laravel.com
. Relationships: has many bookings, leads, itineraries. Associated with roles via spatie package.
roles	id (int), name, guard_name	Roles for RBAC (Spatie laravel-permission). E.g. Admin, Team, User.
model_has_roles	model_type, model_id, role_id	Pivot table (Spatie) linking users.id to roles.id.
teams (opt)	id, name, slug	(Optional) Team groups for multi-office users. Teams can be assigned to users with roles.
team_user	team_id (UUID FK), user_id (UUID FK)	Pivot: which users belong to which teams (with a role stored in model_has_roles for team context).
packages	id, title, description, price, duration_days, image, status	Travel packages table. Fields: price, duration, location, highlights, inclusions, exclusions, etc. Relationships: hasMany package_images, hasMany bookings.
package_images	id, package_id (UUID FK), url, alt_text	Additional images for a package (gallery).
bookings	id, user_id (UUID FK), package_id (UUID FK), itinerary_id (UUID FK, nullable), status, total_price, booked_at	Records of bookings or trip requests. Links to users and packages. If a custom itinerary is booked, itinerary_id links to it.
itineraries	id, user_id, name, start_date, end_date, preferences (JSON)	Custom itineraries created by user. JSON or structured field for user’s trip preferences or meta. (Alternatively, create separate itinerary_items.)
itinerary_items	id, itinerary_id (UUID FK), day_number, location, description	Day-by-day itinerary details (if not using JSON). Each record is a stop or plan for a specific day in an itinerary.
blogs	id, title, slug, content (text), author_id (UUID FK), published_at, status	Blog posts/articles. Supports drafts and SEO fields.
categories	id, name, slug	Categories for blog or possibly for packages (if needed). Many-to-many via pivot tables if required (e.g., package_categories).
leads	id, name, email, phone, message, status, source, created_at	Captured inquiries and contact form submissions. Status (new, contacted, won, lost) for sales tracking.
activity_log	id (int), log_name, description, subject_type, subject_id, causer_type, causer_id, properties, created_at	Spatie Activity Log table (tracks model changes and user actions)
spatie.be
.

All foreign keys reference id (UUID) of the related table. Indices should be added on common search/filter fields (e.g. bookings.status, packages.title).
Spatie’s tables (permissions, role_has_permissions, model_has_permissions) exist for permissions.
Using UUIDs across tables ensures records can be merged or sharded without collision
dev.to
.
Frontend (Blade + UI)
Template Layout: Use Blade layouts (layouts.app) with a responsive nav-bar (brand logo, menu: Packages, Blog, Itinerary, Contact) and footer (site links, social icons). Wrap content in <div class="container mx-auto px-4"> for consistent centering.
Styling: Tailwind CSS for all styling. Include Tailwind via Laravel Mix or Vite. Configure the resources/css/app.css to import Tailwind and scan resources/views
tailwindcss.com
tailwindcss.com
. Set global classes for fonts (e.g. font-sans for Open Sans). Use Tailwind utility classes (flex/grid) for layout. Mobile-first breakpoints (sm,md,lg) ensure responsiveness.
Alpine.js: For interactivity within Blade (like dropdowns, modals, dynamic forms). Alpine.js “sprinkles JS in markup” for things like toggling itinerary steps or filter UI
laravel-livewire.com
. Example:
html
Copy
Edit
<div x-data="{ open: false }">
  <button @click="open = true">Show More</button>
  <div x-show="open"> ... </div>
</div>
Tailwind UI / Components: You may use prebuilt Blade component libraries (e.g. Tailwind UI, Bladewind) for cards, tables, modals, or build custom Blade components. Colors and spacing match the brand theme. Use Heroicons (SVG) for icons (search, menu, etc).
Responsive Design: Ensure all pages work on mobile/tablet: use Tailwind’s grid/flex, percent widths, and responsive utilities. Test on small screens (hamburger menu collapse, stacking content).
Frontend Components
Component	Description	Notes / Tech
NavBar	Top navigation (logo + links)	Blade partial; mobile menu toggle via Alpine
Footer	Footer with links, contact info	Blade partial with grid layout
PackageCard	Shows package image, title, price (for listings)	Reused in package list and search results
PackageDetail	Full package page (gallery, description, features)	Carousel of images, “Book Now” button
SearchBar	Keyword input + filters form	Form submits GET to listing route
FilterSidebar	Filters (destination, price range, duration, themes)	Alpine-powered sliders/checkboxes
ItineraryBuilder	Multi-step itinerary form	Alpine or Livewire for step wizard
BlogList / BlogCard	List of posts (title, excerpt, date)	Pagination, category tags
BlogDetail	Single blog post page	Markdown or HTML content, author
LeadForm	Contact/Inquiry form (name, email, message, tour)	Validates and posts to leads API
ProfilePage	User profile (bookings, saved itineraries)	Protected to logged-in users
AdminLayout	Sidebar + header for admin panel	Separate Blade layout (see Admin UI)

Frontend Libraries: We will use Tailwind CSS (official Laravel integration via Mix/Vite
tailwindcss.com
) and Alpine.js
laravel-livewire.com
. Optionally include HeadlessUI for accessible UI components (menus, dialogs). For modals and tabs, Alpine + Tailwind suffice. No heavy front-end frameworks are needed since Blade handles templating.
Authentication & Authorization
Laravel Auth Scaffolding: Use Laravel Breeze or Jetstream (with Blade) for registration/login scaffolding, which handles email verification and password reset flows automatically
laravel.com
laravel.com
.
Social Login: Implement Laravel Socialite for OAuth. Socialite supports Google and Facebook out of the box (as well as GitHub, etc)
laravel.com
. Configure config/services.php with client IDs, then routes/controllers to redirectToProvider('google') and handle callback. This allows “Log in with Google/Facebook” buttons on the auth pages.
Email Verification: Enable Laravel’s built-in email verification. Ensure User model implements MustVerifyEmail
laravel.com
. Upon registration, users receive a verification link automatically. Unverified users can access the site but are prompted to verify email before booking.
Password Reset: Use Laravel’s password reset feature for “Forgot Password”. It handles sending reset links and updating the password securely
laravel.com
. This is out-of-the-box once CanResetPassword is implemented on User.
Roles & Permissions: Use Spatie laravel-permission to manage RBAC
spatie.be
. Define roles: Admin (full access), Team Member (limited admin tasks), User (normal user), and Guest (not logged in). Assign permissions (e.g. manage packages, view bookings) and attach them to roles. Gate checks (@can in Blade) and middleware (permission:) will control access. Example: $user->assignRole('team-member');.
Role	Capabilities
Admin	Access everything: user & team management, CRUD packages, blog, leads, view analytics.
Team Member	Assist Admin: can CRUD packages/bookings/blog but no system settings or role management.
User	Public: browse packages/blog, create/modify their own bookings and itineraries, update own profile.
Guest	Not logged in: can browse content, search, and use lead/contact forms. Must register to book.

Activity Logging: Track important user actions (logins, data edits) using Spatie activitylog. This auto-logs model changes to an activity_log table
spatie.be
. Display recent activity on admin user profiles for auditing.
Core Features
Travel Package Management
Package Listing: The public “Packages” page shows cards (PackageCard component) for each tour package: thumbnail, title, summary, price. Includes basic filtering (see Search & Filtering below).
Package Detail: Each package has a detail page with a gallery of images, full description, highlights/inclusions, pricing breakdown, and an itinerary summary. An itinerary preview (list of day-by-day stops) can be shown. Include a “Book This Package” button that opens a booking form.
Filtering: Allow filtering by destination, duration (days), price range (slider), travel style (e.g., Adventure, Luxury), and departure dates. Use form inputs or Alpine-enabled sliders.
Admin CRUD: In the admin panel, implement CRUD for packages and categories. Use a form with fields matching the packages table (title, details, price, images). Upload images to storage and save paths. Use slugs for SEO-friendly URLs.
Search: Implement full-text search across package titles/descriptions. Use Laravel Scout (MySQL or Algolia driver) to index packages
laravel.com
. Example:
php
Copy
Edit
class Package extends Model {
    use Searchable;
    protected $fillable = ['title','description','price',...];
}
Scout will sync data. The search box submits queries to a controller that calls Package::search($query)->get(). Return results to Blade.
Search & Filtering
Search Logic: Use Scout or Eloquent query scopes to implement keyword search and filtering. Scout (with Algolia or MySQL driver) keeps indexes updated with package and blog data
laravel.com
. Alternatively, use raw WHERE MATCH(...) full-text queries in MySQL.
Filters: Build a dynamic filter sidebar: selects/checks for destination, price range, and interests. Apply these as query parameters (e.g. ?dest=Goa&max_price=20000). On the server, construct a query like:
php
Copy
Edit
$query = Package::query();
if($request->dest) $query->where('location', $request->dest);
if($request->min_price) $query->where('price','>=',$request->min_price);
// ... and so on
UI Clarity: As recommended, the search should let “customers explore options based on interests” and filter by budget or activities
jploft.com
. Show the active filters on results, and allow clearing them. Paginate results.
Itinerary Builder
Multi-Step Form: Provide a guided wizard for building a custom itinerary. Steps might include: 1) Enter travel dates and number of travelers; 2) Choose destinations/places of interest; 3) Arrange or customize day-by-day plan; 4) Review & Save.
Interactive Components: Use Alpine.js (or Livewire) to make steps dynamic: adding new days, selecting from dropdowns of activities, and reordering items by drag/drop (a JS library like SortableJS can help).
Backend Logic: On completion, save an itinerary record and its itinerary_items. Logic can suggest an initial plan: e.g. distribute destinations across days evenly. Advanced option: integrate Google Maps API or similar to optimize route/timings
medium.com
. For example, use distances to group nearby places on the same day.
AI Optimizations (Future): Optionally, in later versions use simple AI/heuristics to “optimize schedule” based on distance and preferences
jploft.com
. (Not required at MVP.)
Display: After saving, show a printable itinerary page with day-by-day breakdown. Users can adjust it later from their profile. Admin can view all itineraries for assistance.
Booking System
Booking Workflow: When a user books a package (or finalizes a custom itinerary), create a booking record linking the user, selected package (and itinerary if custom), travel dates, and number of people. Include status field (e.g. Pending, Confirmed, Cancelled). No immediate payment integration is required (unless extended) – bookings can be offline-confirmed by the admin.
Lead Generation: Treat incomplete “checkouts” or contact inquiries as leads (see Lead Capture). If payment is added later (e.g. PayPal, Stripe via Cashier), handle it in the booking flow.
Admin Management: In the admin UI, have a “Bookings” section to view all bookings with filters (date range, status). Admin can update status, send confirmation emails, or cancel.
Blog Integration
Blog Listing & Detail: Provide a blog section where articles are listed (title + excerpt + date). Each post has a detail page with full content. Support rich text (use a WYSIWYG editor like TinyMCE or Laravel Nova’s editor).
Categories/Tags: Allow categorizing posts. E.g., “Travel Tips”, “Destination Highlights”. Provide a category filter on blog listing.
Admin CRUD: In admin, have a “Blog Posts” panel to add/edit/delete posts and categories. Use slugs for SEO. Include featured image upload for each post.
Comments (Optional): If needed, integrate Disqus or a comment system. Not critical in v1.
Lead Capture & Contact
Inquiry Form: On pages like “Contact Us” or package detail, include a lead capture form (name, email, phone, message, optional interested package). This submits to the leads table.
Lead Handling: The admin panel will have a Leads section: list incoming leads with details and status (New, Contacted, Quoted, Closed). Admins/team members can add internal notes.
Notifications: Configure email notifications: on new lead, notify sales team; on certain status changes, notify user.
Responsive UI
All pages (listing, detail, forms) must be mobile-responsive. Tailwind’s grid and flex utilities will stack cards on small screens. Test breakpoints to ensure the itinerary builder and package filter sidebar collapse gracefully (e.g., filters hidden behind a “Filters” button on mobile). Ensure forms (search bar, lead form) are mobile-friendly.
Admin Dashboard & Team UI
Admin Layout: A separate Blade layout (e.g. layouts.admin) with a sidebar menu (Dashboard, Packages, Bookings, Itineraries, Blog, Leads, Users, Teams, Settings) and a topbar (with user profile and logout). Use Tailwind to build a clean dark/light sidebar.
Dashboard: Show key analytics/widgets: total users, active bookings, new leads (cards); charts for monthly bookings vs leads. Use a JS chart library (Chart.js or ApexCharts) to render time-series graphs. Also quick links to common actions (e.g. “Add Package”, “View Recent Leads”).
Packages Management: Table of all packages with sort/search. Buttons to add/edit. Form validations on price/dates.
Blog Management: List posts, quick toggles for publish/unpublish. WYSIWYG editor for content.
Booking Management: List all bookings (with user, package, dates, status). Filters by status/date. Show actions to view details or change status.
Itinerary Management: List custom itineraries created by users. Ability to assign a team member to follow-up or modify, or convert to booking.
Lead Management: As above: list leads with contact info and messages. Mark as contacted or assign to staff.
Team Management: Under Settings or a “Teams” menu, allow Admin to invite new team members by email. On invite, create a pending user with a role (Team Member). Once they accept (Laravel’s password setup), they appear under Users with limited privileges.
User Management: List all registered users. Admin can verify email manually, disable accounts, or assign roles. Show activity log (recent logins/actions).
Role/Permission Editor: Possibly a UI (using Spatie’s models) to create new roles or permissions if needed. Or handle via code seeds.
Settings: Admin can update site-wide settings (contact email, social links, banner images, SEO defaults) via a settings form.
Implementation Notes: Use Blade components for tables (e.g., pagination, sortable headers). Protect admin routes with auth and role:admin middleware. Admin pages should not be visible to regular users. Use @can in Blade if fine-grained permission checks are needed.
Frontend and UI Components Details
Header Component: Contains the logo (in saffron/blue), primary menu (Packages, Blog, Itinerary Builder, Contact), and auth links (Login/Register or Profile/Logout). On mobile, use a hamburger menu (Alpine-driven) to toggle links.
Footer Component: Columns for About (Holidayz Manager info), Quick Links, Social Media, and Newsletter signup (optional).
Package Card Component: Used on listing and search pages. Shows image, title, truncated description, price, and a “View Details” link.
Search Bar Component: Persistent on package pages: a text input + filters. Could be implemented as a small form at top of listings.
Filter Component: (Sidebar on desktop, slide-out on mobile) with checkboxes/dropdowns. Use Alpine for show/hide toggling.
Itinerary Builder Components: Complex: likely several Blade partials for each step. For example, a date-picker (can use Alpine or a date library), a list of suggested activities (loaded via AJAX from DB), and sortable day cards (using draggable JS).
Blog Components: Simple listing cards, and a reusable Markdown/HTML rendering component for post content.
Modals/Pop-ups: For actions like confirming delete. Use Alpine x-show for dialogs.
Search & Itinerary Generation Logic
Search Logic: On form submit, the controller applies filters and keywords as described. For full-text, Laravel Scout will auto-index package titles/descriptions
laravel.com
. If using MySQL’s built-in driver, no external service is needed. Ensure Scout is configured in config/scout.php.
Itinerary Algorithm: When the user selects places or interests, the backend can score or sort the choices (e.g. longest to shortest distances). Optionally use Google Places API to fetch attraction details. Use a simple greedy algorithm: assign each selected place to the nearest available day slot. Allow users to manually drag/drop to adjust.
Lead Handling: On form submit, create a new Lead in the DB and send a notification email to the sales team. Mark lead status = New. In admin, status can be updated (e.g. “Contacted”, “Quoted”).
Additional Technical Notes
UUID Usage: We emphasize UUID PKs for security and scalability
dev.to
dev.to
. This means relations use $table->uuid('foreign_id')->nullable(). It’s slightly heavier on indexing, but Hostinger’s shared MySQL should handle moderate load.
Caching: Use artisan config:cache, route:cache on deploy. Enable query caching or Redis (if available on Hostinger) for repeated queries (e.g. popular package lists). Use HTTP caching (Cache-Control) for static assets.
Queues & Jobs: For heavy tasks (sending emails, generating PDFs of itineraries), use Laravel Queues (database or Redis driver). On shared hosting, you may use the database queue and run php artisan queue:work via supervisor if possible.
Testing: Include PHPUnit tests for models and controllers. In a monorepo, tests for each app can live under tests/frontend/ and tests/admin/.
Dev Environment: For local consistency, use Docker/Laravel Sail
jewelhuq.medium.com
. This ensures same PHP version/extensions as Hostinger’s environment.
Monorepo Tools: Optionally use a tool like monorepo.tools or Git subtrees for sharing code. Keep shared code versioned and document interfaces.
Deployment: On each update, push to the main branch or use cPanel Git deployment. Run migrations and artisan storage:link. Monitor logs (storage/logs/laravel.log) and error email notifications.
Security: Always validate/sanitize inputs. Use Laravel’s CSRF tokens on forms. Store sensitive config (API keys, OAuth secrets) in .env. Ensure HTTPS on production.
References and Best Practices
Monorepo Benefits: Centralized code, shared libraries, and unified CI/CD ease development
jewelhuq.medium.com
. Keep dependencies consistent across apps.
Frontend Tools: Alpine.js “sprinkles” interactivity without heavy frameworks
laravel-livewire.com
. Tailwind integration with Laravel is straightforward
tailwindcss.com
.
Authentication: Laravel’s built-in Auth handles email verification and password resets out-of-the-box
laravel.com
laravel.com
. Socialite covers Google/Facebook OAuth
laravel.com
.
RBAC: Use Spatie’s package for robust roles/permissions in the database
spatie.be
.
Activity Logs: Spatie’s activitylog package provides easy logging of model events and user actions
spatie.be
.
Search & AI: A well-designed search improves UX; guidelines suggest clean filtering by interests/budget
jploft.com
. Integrating location/maps APIs can further enhance itinerary planning
medium.com
. Itinerary builders should let users input preferences and auto-generate schedules
jploft.com
.
This blueprint covers the full system – from brand identity through database design, frontend components, and backend logic. It ensures Holidayz Manager can list travel packages, capture leads, let users plan trips, and manage content, all within a scalable Laravel monorepo architecture. All components – Blade templates, Laravel models/controllers, and MySQL schema – work together to replicate and extend holidaytribe.com functionality under the Holidayz Manager brand.