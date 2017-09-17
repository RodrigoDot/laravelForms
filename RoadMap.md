## Requirements

- PHP >= 5.6.4
- OpenSSL PHP Extension
- PDO PHP Extension
- MbString PHP Extension
- Tokenizer PHP Extension
- XML PHP Extension

## Starting the project

Run ``composer create-project --prefer-dist laravel/laravel PROJECTNAME``
Go to ``laravel/.env`` and change the settings to your database configuration in 'DB_' variables
But if you are using laravel 5.4 or higher, MySQL 5.7.7 or MariaDB 10.2.2 it will generate an error when you run Migrations
To fix it you must change your database version or follow this guide
Go to ``laravel/app/Providers/AppServiceProvider.php``
Add a call to load the Schema ``use Illuminate\Support\Facades\Schema;``
Now inside the boot function add ``Schema::defaultStringLength(191);``
That's it, try to migrate your tables again
















x
