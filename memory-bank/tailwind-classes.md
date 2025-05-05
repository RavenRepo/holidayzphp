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

---

_Last updated: 2025-05-05_ 