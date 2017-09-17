## Requirements

- PHP >= 5.6.4
- OpenSSL PHP Extension
- PDO PHP Extension
- MbString PHP Extension
- Tokenizer PHP Extension
- XML PHP Extension

## Starting the project

- Run ``composer create-project --prefer-dist laravel/laravel PROJECTNAME``
- Go to ``laravel/.env`` and change the settings to your database configuration in 'DB_' variables
- But if you are using laravel 5.4 or higher, MySQL 5.7.7 or MariaDB 10.2.2 it will generate an error when you run Migrations
- To fix it you must change your database version or follow this guide
- Go to ``laravel/app/Providers/AppServiceProvider.php``
- Add a call to load the Schema ``use Illuminate\Support\Facades\Schema;``
- Now inside the boot function add ``Schema::defaultStringLength(191);``
- That's it, try to migrate your tables again

## Creating the model, controller and migration files

- Run ``php artisan make:model MODELNAME -m -c``
- This command will generate automagically your model, controller and migration file
- To know how to work with these files go to [Laravel](https://laravel.com/docs/5.5)

## Creatng seeds

- To work using seeds we have to make a interface to fill the data, in laravel we use the FACTORIES
- Run ``php artsan make:factory SEEDNAMEFactory``
- Run ``php artsan make:seed SEEDNAMESeeder``
- Inside ``laravel/database`` there is a directory named as ``factories`` and another one named as ``seeds``
- The factories go to ``factories`` and so on
- To know more about go to [Laravel](https://laravel.com/docs/5.5)
- To fill the data, the Laravel uses a plugin name ``Faker`` by default, to know about go to [Faker](https://github.com/fzaninotto/Faker)












x
