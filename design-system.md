# Holidayz Manager - Design System

This document outlines the core visual identity, UI components, and interaction patterns for the Holidayz Manager platform. It ensures consistency across the `frontend` and `admin` applications.

## 1. Brand Identity Recap

- **Name:** Holidayz Manager
- **Primary Color:** Brand Blue (`#0056B3`) - Used for primary actions, navigation backgrounds, headers, footers.
- **Accent Color:** Saffron (`#FF9933`) - Used for call-to-actions (buttons like "Book Now", "Submit"), highlights, important tags, and visual emphasis.
- **Neutral Palette:**
    - Backgrounds: White (`#FFFFFF`), Light Gray (`#F8F9FA`)
    - Text: Dark Gray (`#343A40`), Medium Gray (`#6C757D`)
    - Borders/Dividers: Light Gray (`#DEE2E6`)
- **Typography:**
    - Headings: **Poppins** (Bold, SemiBold) - Clean, modern, slightly rounded. Use for H1-H4.
    - Body Text: **Open Sans** (Regular, SemiBold) - Highly readable, friendly. Use for paragraphs, labels, captions, buttons.
- **Logo:** (To be inserted/referenced) - Used in header, footer, potentially favicons.

## 2. Layout & Spacing

- **Grid System:** Leverage Tailwind's responsive grid (`grid`, `grid-cols-*`) for page layouts.
- **Container:** Use a max-width container with auto margins (`container mx-auto`) and horizontal padding (`px-4` or `px-6`) for consistent content alignment.
- **Spacing Scale:** Utilize Tailwind's default spacing scale (multiples of 4px) for margins (`m-*`), padding (`p-*`), and gaps (`gap-*`). Maintain consistency (e.g., `p-4`, `p-6`, `mb-4`, `gap-6`).
- **Breakpoints:** Follow Tailwind's standard breakpoints (`sm`, `md`, `lg`, `xl`, `2xl`) for responsive design.

## 3. Core Components

*(Details for each component will include visual examples/markup structure later)*

- **Buttons:**
    - **Primary:** Solid Brand Blue background (`bg-brandblue`), white text (`text-white`), subtle hover (`hover:bg-blue-700`), rounded corners (`rounded-md`).
    - **Secondary/Accent:** Solid Saffron background (`bg-saffron`), white text (`text-white`), hover (`hover:bg-orange-500`), rounded (`rounded-md`).
    - **Outline:** Transparent background, Brand Blue border (`border border-brandblue`), Brand Blue text (`text-brandblue`), hover (`hover:bg-brandblue hover:text-white`).
    - **Text/Link:** Standard link styling, Brand Blue text, underline on hover.
    - **Sizes:** Standard, Large (for primary CTAs). Consistent padding (`py-2 px-4`).
- **Forms:**
    - **Inputs/Textareas:** Simple border (`border border-gray-300`), rounded (`rounded-md`), padding (`px-3 py-2`), focus state (`focus:ring-brandblue focus:border-brandblue`).
    - **Labels:** Open Sans, Medium Gray (`text-gray-600`), positioned above input.
    - **Validation:** Use border colors (Red for error, Green for success) and helper text below the input.
- **Navigation:**
    - **Header (Frontend):** Brand Blue background, Logo aligned left, Navigation links (Open Sans, white/light gray, hover effect) centered or right, Auth buttons (Secondary style). Mobile: Collapses into a hamburger menu (Alpine.js).
    - **Footer (Frontend):** Brand Blue background, sectioned layout (About, Links, Social, Contact), light text.
    - **Sidebar (Admin):** Light or Dark theme option, clear iconography, text labels, active state highlight (Brand Blue or Saffron).
- **Cards (Package, Blog):** White background (`bg-white`), subtle shadow (`shadow-md`), rounded corners (`rounded-lg`), consistent padding (`p-4` or `p-6`). Image aspect ratio maintained. Clear hierarchy for title, description, price/meta.
- **Modals:** Centered overlay, white background card, rounded corners, shadow, clear close button (icon), header, body, action buttons (Primary/Secondary). Use Alpine.js for state management.
- **Alerts/Notifications:** Colored backgrounds (Blue for info, Green for success, Yellow for warning, Red for error), icons, clear text.

## 4. Iconography

- **Set:** Heroicons (Outline or Solid) - Provides a clean, consistent set readily available via Tailwind UI / Blade UI Kit.
- **Usage:** Use for buttons, navigation, list items, status indicators. Ensure sufficient size and color contrast.

## 5. Animations & Transitions

- **Subtle Transitions:** Use Tailwind's `transition` utilities for hover effects on buttons and links (`duration-150 ease-in-out`).
- **Micro-interactions:** Consider subtle animations for loading states (spinners), form submissions (checkmarks), or accordion expands/collapses. Avoid overly complex or jarring animations.
- **Page Transitions:** (Optional) Simple fade-in/out on page load if desired, but prioritize performance.

## 6. Accessibility (WCAG 2.1 AA)

- **Color Contrast:** Ensure text has sufficient contrast against backgrounds (use tools to check Brand Blue/Saffron combinations). Minimum 4.5:1 for normal text, 3:1 for large text.
- **Keyboard Navigation:** All interactive elements (links, buttons, form inputs) must be focusable and navigable using the keyboard. Maintain logical focus order. Use `focus:ring` utilities.
- **Semantic HTML:** Use appropriate HTML5 tags (`<nav>`, `<main>`, `<article>`, `<aside>`, etc.).
- **ARIA Roles:** Add ARIA attributes where necessary, especially for custom components or dynamic content managed by Alpine.js (e.g., `aria-expanded` for accordions).
- **Image Alt Text:** Provide descriptive `alt` text for all meaningful images.

## 7. Responsiveness

- **Mobile-First:** Design components and layouts with mobile screens in mind first.
- **Fluid Grids & Images:** Use relative units and Tailwind's responsive modifiers (`sm:`, `md:`, etc.) extensively.
- **Touch Targets:** Ensure buttons and interactive elements are large enough for easy tapping on mobile.
- **Content Prioritization:** Hide or re-flow less critical content on smaller screens. Navigation collapses cleanly. 