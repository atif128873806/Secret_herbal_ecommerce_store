# Herbal Store

Laravel storefront using the supplied Figma Home Page and ALL Products compositions.

## Local setup

Requirements: PHP 8.3+, Composer, Node.js, npm, and SQLite support.

```sh
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
npm install
npm run build
php artisan serve
```

Open the URL printed by `php artisan serve` (normally `http://127.0.0.1:8000`).

The four seeded products are labeled demo catalog content sourced from the Figma design.
Replace their identities, photos, product descriptions, ratings, and prices with approved
Herbal data before launch. The working cart uses the session and stops before checkout;
there is no payment provider, order creation, or shipping calculation in this phase.

## Checks

```sh
php artisan test
npm run build
```
