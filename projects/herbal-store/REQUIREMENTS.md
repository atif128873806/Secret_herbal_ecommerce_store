# Accepted requirements

| ID | Requirement | Acceptance criteria | Source |
| --- | --- | --- | --- |
| HERB-001 | Create a new Herbal storefront using Laravel and PHP. | Standalone Laravel app under this project; page copy/wordmark says Herbal. | SRC-USER-001, 2026-10-18 |
| HERB-002 | Reproduce the supplied Figma home and all-products compositions. | Use Figma layout, palette, Montserrat typography, and approved assets; adapt for mobile/tablet. | SRC-FIGMA-001, Home Page and ALL Products frames; SRC-USER-001 |
| HERB-003 | Provide browseable product catalog interactions. | Product list, search, category filters, sorting, pagination, and product detail page work server-side. | SRC-FIGMA-001; user request for a functional website |
| HERB-004 | Provide a working cart without checkout/payment in this phase. | Session cart supports add, quantity update, removal, count, and subtotal. | SRC-USER-002, 2026-10-18 |
| HERB-005 | Use labeled demo products until Herbal data is supplied. | Demo source is documented and UI labels it; no demo record is represented as live Herbal inventory. | SRC-USER-003, 2026-10-18 |
| HERB-006 | Implement responsive, accessible storefront pages. | Semantic headings/forms, labels, focus states, keyboard-accessible controls, and no horizontal overflow at mobile/tablet widths. | SRC-USER-001 |
| HERB-007 | Recreate the complete Figma homepage, including every supplied homepage image and visible section. | Use localized assets for the hero, trust strip, categories, product and innovation carousels, sample stories/review images, quiz banner, deals, video posters, quote, press logos, and footer. Add responsive carousel/navigation interactions while labeling Figma catalog, review, offer, and trust material as examples. | SRC-USER-004, 2026-10-19 |
| HERB-008 | Apply the supplied Secret Herbals logo and approved new brand color theme. | Use the “Secret Herbals by Shazia Saeed” logo in the storefront header and footer; remap interface colors to the approved forest/gold/sage/charcoal/warm-ivory palette without changing the Figma page structure. | SRC-USER-005, 2026-10-20 |

## Deferred

- Live catalog, approved Herbal product content, prices, stock, and photography.
- Checkout, payment provider, order processing, customer accounts, shipping, taxes, and
  order tracking. User asked to stop this phase at the cart.
- Admin catalog management and production deployment.
