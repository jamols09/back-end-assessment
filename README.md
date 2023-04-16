## Installation

- clone project git@github.com:jamols09/back-end-assessment.git
- composer dump-autoload -o / composer install
- npm install
- npm run build / npm run dev
- go to migrations folder
    - leave one create_sessions_table
- php artisan migrate:fresh
- php artisan vendor:publish --tag=jetstream-views
