- [x] Develop simple TO DO app with Laravel documentation can be found in: https://laravel.com/docs/9.x/installation)
- [x] The TODO list need to be saved and loaded from the DB (create a simple schema via migration)
- [x] Allow user to add more into the list and update the page, appending the new record on top (latest first)
- [x] Design the user session without the need for authentication/login (end/reset the TODO list when browser tab is closed/reopen)

## Installation
- After pulling the repo from git, run below command
```
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
```

