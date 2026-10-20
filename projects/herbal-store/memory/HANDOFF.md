# Herbal Store handoff

Goal: implement a new Herbal branded Laravel storefront from the supplied Figma desktop
home and catalog layouts. User approved labeled demo product data and cart-only behavior.

Current: Laravel 13.37.0 storefront is implemented under `projects/herbal-store`. It includes
the Herbal home, product catalog with search/category/sort, product detail pages, and a
session-backed cart. Figma images are localized. The demo catalog and source packaging remain
preview material and must be replaced with approved Herbal product data and imagery before
launch. The user explicitly deferred payment/checkout. Do not present demo reviews, prices, or
claims as production facts. Verification: `php artisan test` (4 tests, 30 assertions),
`npm run build`, and `composer validate --no-check-publish` pass; local desktop homepage and
catalog were reviewed in the browser. See `TASKS.md`, `REQUIREMENTS.md`, and `README.md`.

Homepage continuation (2026-10-19): the user requested a detailed full-page recreation of
the Figma home, including every image and interactive carousel. Homepage sections and assets
are now localized and included: hero, trust strip, categories, 12-item best-seller slider,
12-item innovation slider, four before/after sample stories, quiz banner, 30 review photos,
three deal images, four static video poster/product pairs, quote, nine press logos, and the
multi-column footer. Search, responsive navigation, category tabs, carousel arrows/progress,
video preview dialogs, and cart forms are wired. Verification completed: `npm run build`,
`php artisan test` (4 tests, 30 assertions), and route listing pass; the local browser rendered
the seeded homepage and all sections. The review was extended to desktop (1440px), tablet
(768px), and mobile (390px); all three reported no horizontal overflow. The 112px desktop
category tiles match the Figma specification. There is no mobile Figma frame, so phone layouts
are responsive adaptations rather than a pixel comparison.

Visual QA follow-up (2026-10-19): corrected the announcement and trust-strip colors, restored
Figma-sized category tiles, and changed the footer to the light-blue Figma surface. The review
gallery now uses the Figma card anatomy and all 30 supplied images, with sample-copy disclosure.
Browser checks covered mobile menu open/close, product filtering, carousel arrow movement,
static video preview open/close, and add/remove cart; the test item was removed afterward.
Re-ran `npm run build` and `php artisan test` successfully (4 tests, 30 assertions). The preview
was returned to the empty-cart homepage and its temporary viewport override was reset. Figma
campaign imagery, prices, claims, and reviews remain demo content and must not be represented as
verified Herbal facts. Public background image URLs remain configured for runtime resolution.
See `TASKS.md` for project status.

Hook follow-up (2026-10-19): replaced the homepage carousel progress animation's width and
margin transitions with a transform-based indicator. Montserrat remains required by HERB-002;
the narrow `overused-font=montserrat` ignore is persisted in `.impeccable/config.json`.

Catalog visual QA follow-up (2026-10-19): aligned the catalog's first page with the Figma
`ALL Products` composition by rendering all 18 sourced demo products before pagination. The
Laravel paginator remains active for larger catalogs; a feature test verifies page two once
a 19th item exists. Browser checks at 1440px, 768px, and 390px found no horizontal overflow
and confirmed the 18 product cards at every viewport. Search, concern/category filters,
price sorting, mobile navigation, cart links, and pagination were checked. `php artisan test`
passes (5 tests, 45 assertions), `npm run build` passes, and
`composer validate --no-check-publish` passes. Vite reports two existing runtime-resolved background-image URL
warnings. The supplied Figma contains Home Page and ALL Products frames, but no individual
product-detail frame, so the detail page can only be sanity-checked against implementation
requirements. The current logo/colors and catalog are still demo branding/content until the
user supplies approved product data; checkout/payment remains out of scope.

Brand identity update (2026-10-20): user approved the forest/gold/sage/charcoal/warm-ivory
palette and supplied the Secret Herbals logo. Applied the palette to the storefront, replaced
header and footer wordmarks with the supplied logo, and updated metadata and brand copy. The
original logo file is used as supplied: transparent cutout attempts introduced edge artifacts,
so its near-black background is presented on a matching dark plaque. `npm run build` passes.
Local browser review confirmed the branded home and catalog at mobile and desktop viewport
layouts. Figma campaign imagery and demo product data remain preview material and should be
replaced or approved before launch; checkout/payment remains out of scope. See `TASKS.md`.

Header palette refinement (2026-10-20): user felt the near-black header was too stark. Changed
the header to deep forest (`#183A2B`), kept warm-ivory/gold controls, retained the logo on a
small dark plaque, and kept the navigation warm ivory. Updated the browser theme color and
design/decision records. `npm run build` passes; the refreshed homepage visibly shows the
forest header.

Logo transparency update (2026-10-20): user asked to remove the black background from the logo.
The original upload remains preserved under `context/brand/` and the previous public asset; the
site now uses `public/images/brand/secret-herbals-logo-transparent.png` with an alpha channel.
Removed the logo plaque styling, keeping the transparent gold artwork directly on the deep-
forest header/footer. Browser screenshot confirms the logo blends into the forest header;
`npm run build` passes.
