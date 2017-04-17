DrugDash
=================
[DrugDash][drugdash] exists to give Drug Supply Chain funding and implementing partners accurate information about drug consumption in health centers for their budgeting and planning decision making process.

How to set up
-------------
1.  Clone the repository by running `git clone https://github.com/prunestech/drugdash.git`.
2.  If you don't have composer installed, head over to [their website][composer] and set it up.
3.  Move into the root directory of the application and run `composer install` to install all the dependencies for the application.
4.  Edit the `.env` file and add the database username and password to connect to the database.
5.  Run `php artisan migrate` for the application to run migrations and set up the database structure for you.
6.  Run `php artisan db:seed` for the application to add for you default data.
7.  Run `php artisan serve` for the application to start the Laravel development server.
8.  Head over to your browser and type `127.0.0.1:8000` to access the application.

Stack
-------------
  * PHP/Laravel 5.4

Requirements
--------------------
  * PHP >= 5.6.4
  * OpenSSL PHP Extension
  * PDO PHP Extension
  * Mbstring PHP Extension
  * Tokenizer PHP Extension
  * XML PHP Extension

Dependencies
--------------
  * [Laravel Collective][collective]
  * [Flash][flash]

[drugdash]: http://drugdash.prunestech.com "DrugDash"
[collective]: https://laravelcollective.com/docs/5.3/html "Laravel collective"
[flash]: https://github.com/laracasts/flash  "Flash"
[composer]: https://getcomposer.org/download/ "Composer download page"
