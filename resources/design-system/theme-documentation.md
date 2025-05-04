# HolidayzPHP Design System

## Overview
This document outlines the design system for HolidayzPHP, ensuring consistency across frontend and admin applications. It defines the visual language, including colors, typography, spacing, animations, and responsive design principles.

## 1. Color Palette
- **Primary**: #2C5282 (Deep Blue) - Used for primary actions, headers, and branding.
- **Secondary**: #63B3ED (Sky Blue) - Used for secondary actions, highlights, and accents.
- **Accent**: #F6AD55 (Warm Orange) - For call-to-action buttons and important notices.
- **Neutral Light**: #F7FAFC (Cloud White) - Backgrounds and cards.
- **Neutral Dark**: #1A365D (Navy) - Text and dark mode elements.
- **Success**: #48BB78 (Emerald) - Positive feedback and success messages.
- **Warning**: #F6AD55 (Warm Orange) - Alerts and warnings.
- **Error**: #F56565 (Rose) - Errors and negative feedback.

## 2. Typography
- **Font Family**: 'Inter', sans-serif - Clean, modern, and highly readable.
- **Headings**:
  - H1: 2.5rem (40px)
  - H2: 2rem (32px)
  - H3: 1.75rem (28px)
  - H4: 1.5rem (24px)
  - H5: 1.25rem (20px)
  - H6: 1rem (16px)
- **Body Text**: 1rem (16px)
- **Small Text**: 0.875rem (14px)
- **Line Height**: 1.5 for body, 1.2 for headings
- **Font Weights**: 400 (regular), 500 (medium), 700 (bold)

## 3. Spacing
- **Base Unit**: 0.5rem (8px)
- **Scale**: Multiples of 8px (8, 16, 24, 32, 40, 48, etc.)
- **Padding**: 
  - Containers: 1.5rem (24px)
  - Cards: 1rem (16px)
  - Buttons: 0.75rem (12px) vertical, 1.5rem (24px) horizontal
- **Margins**: 
  - Between sections: 3rem (48px)
  - Between elements: 1rem (16px)

## 4. Animations and Transitions
- **Hover Effects**: Scale transform (1.05) on buttons and cards, 0.2s ease-in-out.
- **Fade In**: Opacity from 0 to 1 over 0.5s for page loads and modals.
- **Slide In**: TranslateY from 20px to 0 over 0.5s for staggered content appearance.
- **Button Hover**: Background color transition over 0.3s ease.

## 5. Responsive Design Breakpoints
- **Mobile**: Up to 640px (max-width)
- **Tablet**: 641px to 768px
- **Small Desktop**: 769px to 1024px
- **Desktop**: 1025px to 1280px
- **Large Desktop**: Above 1281px
- **Design Principle**: Mobile-first approach, with progressive enhancements for larger screens.

## 6. Components
- **Buttons**: Rounded corners (6px), shadow on hover, clear hierarchy (primary, secondary, outline).
- **Cards**: Subtle shadow, rounded corners (8px), consistent padding.
- **Forms**: Clean labels, focused input states with border color change, error states in red.
- **Navigation**: Sticky header for desktop, hamburger menu for mobile with smooth transitions.

## 7. Accessibility
- **Contrast Ratios**: Minimum 4.5:1 for normal text, 3:1 for large text.
- **ARIA Roles**: Properly defined for navigation, forms, and interactive elements.
- **Keyboard Navigation**: Full support for tabbing through interactive elements.

## 8. Dark Mode
- Toggleable dark mode with inverted colors for backgrounds and text, maintaining contrast ratios.
- Primary Dark Background: #1A365D
- Secondary Dark Background: #2D3748
- Text in Dark Mode: #E2E8F0

This design system will be implemented via a global CSS file and referenced in all Blade templates to ensure consistency across the HolidayzPHP project.
