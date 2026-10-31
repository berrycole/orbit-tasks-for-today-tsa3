# Orbit Tasks for Today

IT0049 Technical Summative Assessment 3 rebuilt the TSA1 Tasks for Today Management System in Laravel while retaining the Orbit Devices visual style. The application has four read-only pages backed by Eloquent and SQLite.

| URL | Page | Data |
| --- | --- | --- |
| `/` | Today | Tasks whose `task_date` is today in the Asia/Manila timezone |
| `/tasks` | Task List | Every task, ordered by date and then ID |
| `/profile` | Profile | The single seeded user record |
| `/about` | About | Project and developer information |

## Run locally

Requires PHP 8.3 or later with PDO SQLite and Laravel's standard extensions, plus Composer 2. No frontend build is needed because Orbit's CSS and image assets are served directly from `public/assets`.

```powershell
git clone https://github.com/berrycole/orbit-tasks-for-today-tsa3.git
cd orbit-tasks-for-today-tsa3
composer install
Copy-Item .env.example .env
php artisan key:generate
New-Item database/database.sqlite -ItemType File
php artisan migrate --seed
php artisan serve --host=127.0.0.1 --port=8000
```

On macOS/Linux, use `cp .env.example .env` and `touch database/database.sqlite` in place of the corresponding PowerShell commands. Then open `http://127.0.0.1:8000`.

The migrations define `tasks` (`title`, `status` defaulting to `pending`, `task_date`, and timestamps) and `users` (unique `username`, `full_name`, `email`, and timestamps). Seeders recreate TSA1's eight sample tasks across yesterday, today, tomorrow, and the following day, plus the Berry Cole sample user. Running `php artisan db:seed` again updates those same sample records without duplicates. The sample task dates are relative to the day of seeding; reseed to move them to a later day.

## Verify

```powershell
php artisan test
php artisan route:list --except-vendor
php artisan view:cache
```

Feature tests cover the seeded record counts, date filtering, ordering, navigation, profile, HTML escaping, and repeatable seeding. The local `.env`, SQLite database, dependencies, and test cache are excluded from Git. See `public/assets/IMAGE-CREDITS.md` for photo sources.

The activity document also lists a hosted application link as a submission item. This repository contains the requested local project only; no deployment is configured.
