# Tailwind Custom Classes Registry - HolidayzPHP

This file records all custom Tailwind classes, theme extensions, and utility patterns used in the project. Update this file whenever you add, change, or remove custom classes or theme extensions in `tailwind.config.js`.

## Custom Colors
- `brandblue`: #0056B3
- `saffron`: #FF9933

## Custom Box Shadows
- `shadow-card`: 0 10px 15px -3px rgba(0, 0, 0, 0.08), 0 4px 6px -2px rgba(0, 0, 0, 0.01)
- `shadow-soft`: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -1px rgba(0, 0, 0, 0.03)

## Custom Border Radius
- `rounded-xl`: 1rem
- `rounded-2xl`: 2rem

## Custom Fonts
- `font-poppins`: 'Poppins', sans-serif
- `font-open-sans`: 'Open Sans', sans-serif

## Flowbite Integration
- Flowbite is installed and will be used for UI components across the project.
- Remember to add `require('flowbite/plugin')` to the plugins array in `tailwind.config.js`.
- Reference: https://flowbite.com/docs/getting-started/laravel/

## Usage Notes
- Use these classes in Blade templates and CSS with `@apply` as needed.
- When adding new custom utilities, update both `tailwind.config.js` and this registry.
- Review this file during code reviews and before major refactors.

## UI Card Component
- **Location:** `components/ui/card/card.blade.php`
- **Props:**
  - `image`: Card image URL
  - `alt`: Image alt text
  - `badge`: Optional badge (e.g., duration, category)
  - `title`: Card title
  - `subtitle`: Card subtitle
  - `description`: Card description
  - `price`: Price or highlight value
  - `action`: HTML for action button/link
  - `class`: Extra classes
- **Classes Used:**
  - `bg-white`, `rounded-2xl`, `shadow-card`, `hover:shadow-xl`, `transition-all`, `duration-300`, `flex`, `flex-col`, `h-full`, `aspect-w-16`, `aspect-h-9`, `overflow-hidden`, `rounded-t-2xl`, `transition-transform`, `duration-500`, `hover:scale-105`, `absolute`, `top-4`, `right-4`, `bg-saffron`, `text-white`, `px-4`, `py-1.5`, `rounded-full`, `text-xs`, `font-semibold`, `shadow-soft`, `p-6`, `font-poppins`, `font-open-sans`, `text-gray-900`, `text-gray-500`, `text-gray-600`, `text-brandblue`, `font-bold`, `text-lg`, `mb-2`, `mb-4`, `mb-1`, `mt-auto`
- **Usage Example:**

```blade
<x-ui.card.card
    :image="$package['image']"
    :alt="$package['title']"
    :badge="$package['duration']"
    :title="$package['title']"
    :description="$package['description']"
    :price="'$' . number_format($package['price'])"
    :action="'<a href=\'' . $package['link'] . '\' class=\'inline-flex items-center text-brandblue hover:text-brandblue-dark font-medium transition-colors duration-300\'>View Details</a>'"
/>
```

- **Notes:**
  - Use this card for packages, blog posts, CTAs, and more for a consistent UI.
  - Extend with slots or additional props as needed.

## Why Choose Us Component
- **Location:** `components/ui/why-choose-us/why-choose-us.blade.php`
- **Usage:**
  - Use as `<x-ui.why-choose-us.why-choose-us :features="$features" />`
  - Features array should include `icon`, `title`, and `description` for each feature.
- **Custom Classes/Patterns:**
  - `bg-gradient-to-br from-saffron/10 via-white to-brandblue/5` (section background)
  - `bg-white/70 backdrop-blur-md` (glassmorphism effect on cards)
  - `bg-gradient-to-br from-saffron/80 to-brandblue/80` (icon background)
  - `shadow-soft`, `shadow-card`, `rounded-2xl`, `drop-shadow`, `font-poppins`, `font-open-sans`
  - Responsive grid: `grid-cols-1 md:grid-cols-2 lg:grid-cols-4`
- **Notes:**
  - This component is now modular and can be reused anywhere in the project.
  - All custom classes are defined in `tailwind.config.js` and should be kept in sync with this registry.

---
## Itinerary Section Layout (package/itinerary.blade.php)

- **Container:** `max-w-3xl mx-auto px-4 sm:px-6 lg:px-8`
  - Centers the itinerary section on the page.
  - Sets a maximum width for readability and visual balance.
  - Adds responsive horizontal padding for mobile and desktop.
- **Vertical Spacing:** `space-y-8`
  - Adds consistent vertical space between each itinerary day card.
- **Card Classes:**
  - `bg-white/70 backdrop-blur-md rounded-2xl border border-gray-100 shadow-soft overflow-hidden hover:shadow-lg transition-all duration-300`
  - Ensures cards are visually distinct, modern, and consistent with the design system.

**Rationale:**
- The itinerary section was previously left-aligned and cramped. The new layout centers the content, improves readability, and matches the reference design for a more professional, visually appealing look.
---

_Last updated: 2025-05-05_ 