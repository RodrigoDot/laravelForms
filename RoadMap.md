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
- To know how to work with these files go to [Laravel DOC](https://laravel.com/docs/5.5)

## Creatng factories and seeds

- To work using seeds we have to make a interface to fill the data, in laravel we use the FACTORIES
- Run ``php artsan make:factory SEEDNAMEFactory``
- Run ``php artsan make:seed SEEDNAMETableSeeder`` (name in plural)
- Inside ``laravel/database`` there is a directory named as ``factories`` and another one named as ``seeds``
- The factories go to ``factories`` and so on
- To know more about go to [Laravel DOC](https://laravel.com/docs/5.5)
- To fill the data, the Laravel uses a plugin name ``Faker`` by default, to know about go to [Faker](https://github.com/fzaninotto/Faker)

## Using the factories states

- Using the factories states we can reuse some code,

```php
$factory->define(\App\Client::class, function (Faker $faker) {
      return [
        'name' => $faker->name,
        'email' => $faker->safeEmail
      ];
  });

$factory->state(\App\Client::class, 'pessoa_fisica', function(Faker $faker) {
    $denied = array("-", " ", "+", ".", "(", ")", "x");
    $cpf = str_replace($denied, "", $faker->phoneNumber);
      return [
        'document' => $cpf,
        'born' => $faker->date()
      ];
  });

$factory->state(\App\Client::class, 'pessoa_juridica', function(Faker $faker) {
    $denied = array("-", " ", "+", ".", "(", ")", "x");
    $cnpj = str_replace($denied, "", $faker->phoneNumber) . '/0001';
      return [
        'document' => $cnpj,
        'fantasy_name' => $faker->company
      ];
  });
```

- The code above have three different pieces,
- The first contains the general attributes of ``Clients`` model, in this piece we used the ``DEFINE`` method to declare that this code should be load every time that this class is loaded
- The second contains the individuals attributes that only the ``pessoa_fisica`` has as a sub-group of ``Clients``, here we used the ``states`` method to declare that this piece of code only should be load when the ``factory state`` is equals to ``pessoa_fisica``.
- The third is the same as the second.

## Running TableSeeders

- To run ours factories files we must run first ours seeds files and then populate the database, we need to tell to the Laravel how to do it
- Go to ``laravel/database/seeds/DatabaseSeeder.php``, there you will find something like this:
```php
//$this->call(UsersTableSeeder::class);
```

- This file is the dafult TableSeeder, a file that runs the seeds, through this one you can tell to Laravel to run yours won tableseeders files
- We have already learned how to make tableseeders before
- So inside the code you saw above, put the lines exactly the same as the example, changhing only the name of your tableseeder file

## Calling factories states

- After created yours factories and tableseeders, to choose wich state should be loaded by the DatabaseSeeder follow this:
- Imagine that you have a factory file just like the example in **Using the factories states**, so to call them put the code below inside the method ``RUN`` of your model tableseeder file.
```php
factory(\App\Client::class, 20)->states('pessoa_fisica')->create();
```

- It will run the piece of code that have the general attributes and the piece that contains the attributes of the ``pessoa_fisica`` state 20 times as passed as a parameter, in the state declaretion we passed the name of our choosen state and at the end the method ``create()``
- To run it ``php artisan db:seed``

## Singletons

- Singletons are declared instances of some class that you define as a static instance, what does it means?
- It menas that this declared instance will be the same since the first second that your application is loaded until the moment that you kill this instance or finish your application.
- A good example of a singleton is when you want to change the language of the FAKER

## How to change FAKER language

- Go to ``laravel/.env`` and add the following code ate the end of the file
``FAKER_LANGUAGE=pt_BR``
- Now go to ``laravel/app/AppServiceProvider.php`` and add the following code inside the register function:
```php
if($this->app->environment() !== 'production') {
  $this->app->singleton(\Faker\Generator::class, function() {
    return \Faker\Factory::create(env('FAKER_LANGUAGE'));
  });
}
```

- This code will make FAKER as a singleton and defines it with the configuration that we have done inside the ``.env`` file.
- Now every time that we call a FAKER instance this one will be the same ever and will always have our personalized settings.












x
