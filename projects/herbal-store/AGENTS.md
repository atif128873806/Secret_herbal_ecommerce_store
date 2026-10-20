# Herbal Store — Project Rules

Read the workspace contract at `../../AGENTS.md` and the project requirements, decisions,
source registry, architecture, and design notes before changing this application.

- This is a new Laravel 13 / PHP storefront branded **Herbal**.
- Figma supplies the visual layout and approved design assets. Replace Jenpharm text branding
  with Herbal; use supplied product images only as clearly labeled demo catalog content.
- Product prices, names, and review counts seeded for development are demo data, not live
  inventory or approved Herbal claims.
- The approved first phase includes home, catalog search/filter/sort, product details, and a
  session cart. Checkout, payment, orders, account management, and fulfillment are out of
  scope until requirements and integrations are supplied.
- Keep Laravel patterns standard and proportional. Validate all state changes server-side;
  do not expose credentials or place temporary Figma URLs in application code.
- Preserve accessible labels, keyboard access, visible focus, responsive behavior, and the
  Figma palette/typography. Desktop is designed in Figma; smaller breakpoints are an
  implementation adaptation.
- Keep catalog records clearly identified as demo content until Herbal product data arrives.
- Run relevant feature tests and the Vite production build before claiming verification.
