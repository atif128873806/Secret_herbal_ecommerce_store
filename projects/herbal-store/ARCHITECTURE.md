# Application architecture

- Laravel 13 MVC application with Blade views and Vite compiled CSS/JavaScript.
- `Product` is the catalog model. Search, filtering, sorting, and pagination run on the
  server through Eloquent queries. SQLite is the local database default.
- `CartController` stores only product IDs and integer quantities in the Laravel session.
  The cart view resolves active products and computes its subtotal using integer PKR values.
- Cart validation caps quantity and rejects inactive/missing products. There is no checkout,
  payment, stock reservation, or order persistence in this phase.
- Seeded product records are demos. Replace the seeder with approved Herbal product data
  before production. No third-party store platform or payment service is connected.
- Product images live under `public/images`; Figma URLs are never used at runtime.
