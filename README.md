# Paws Back Home

A PHP Laravel portal for browsing and managing reports of lost, found, and reunited pets. The interface and sample records are in English. The application includes city, species, and status filters and uses SQLite.

## Features

- Public browsing, search, filters, and pagination with 12 reports per page.
- Pet details with neighborhood, city, incident date, and identifying features.
- Create, edit, update status, and delete reports.
- Protect editing with HTTP Basic credentials supplied through the environment.
- Validate forms, escape output, and protect requests against CSRF.

## Run locally

Requirements: PHP 8.3 or newer, Composer, and the extensions required by Laravel, including PDO SQLite and mbstring. The application uses Laravel 13 and does not require Node for its current pages.

```sh
composer install
cp .env.example .env
php artisan key:generate
php -r "file_exists('database/database.sqlite') || touch('database/database.sqlite');"
php artisan migrate --seed
php artisan serve
```

In PowerShell, replace `cp .env.example .env` with `Copy-Item .env.example .env`. Open http://localhost:8000.

To enable creating and editing reports, set `PORTAL_EDITOR_USER` and `PORTAL_EDITOR_PASSWORD` in your local `.env` file or runtime environment. There are no default credentials. Without both values, editing routes return an unavailable response; browsing remains accessible. Use HTTPS outside local development.

The sample records do not contain personal phone numbers, home addresses, photographs of people, or pet owner details. In this initial version, visitors contact the portal administrator outside the application. The SQLite database and `.env` are not tracked by Git.

## Project structure

- `app/Models/PetReport.php`: report data and status labels.
- `app/Http/Controllers/PetReportController.php`: browsing and report operations.
- `app/Http/Requests`: form validation.
- `app/Http/Middleware`: editor authentication.
- `resources/views/pets`: Blade pages.
- `database/migrations` and `database/seeders`: schema and fictional records.

## Delivery status

This initial code has not been run locally because PHP and Composer are not installed in the authoring environment. No tests have been added or run. After installing dependencies, commit the generated `composer.lock` to record the resolved versions.

This is a laboratory application with no hosting configured. Before production use, configure HTTPS, `APP_DEBUG=false`, `APP_KEY`, persistent storage, editor credentials, and a moderation process. No workflows were added and no organization security settings were changed.

## Skeleton attribution

The initial application structure is derived from [laravel/laravel, branch 13.x](https://github.com/laravel/laravel/tree/13.x), commit `9ffef3bc4241e3cc333ef267258a404d0d95f194`. See `THIRD_PARTY_NOTICES.md` for skeleton and dependency attribution.

Reference: [Official Laravel documentation](https://laravel.com/docs/13.x).
