# React from scratch — dummy API

This laravel app is used to provide a few simple API endpoints for the React from scratch Laracasts series.

There is no authentication nor access restriction in there — it's just meant to be ran locally alongside the React app to have some endpoints to hit.

For things to work properly, you'll need to:

-   **Copy dummy images**: Clone template design project [https://github.com/luisprmat/luisprmat-react-from-scratch-template](https://github.com/luisprmat/react-from-scratch.git) and copy folder `public/images` in this project in `storage/app/seeders/images`. This project doesn't contain images to avoid duplication (save space in github). Therefore we must copy them. By default when run *seeders*, the dummy initial images to be searched in folder `storage/app/seeders/images`.
-   **Seed the data**: Run the Database seeder with `php artisan migrate:fresh --seed`. You should see 9 puppies in your database.
-   **Create a symbolic link from source directory**: Run `php artisan storage:link` to make stored images accessible publicly.
-   **Run the Laravel app locally** and make sure the React app uses the correct API URL when trying to hit it.
