<?php

require_once __DIR__ . '/documento.php';

$factory->define(\App\Client::class, function (Faker\Generator $faker) {

  $cpfs = cpfs();
  $cnpj = cnpjs();

    return [
      'name' => $faker->name,
      'document' => $cpfs[array_rand($cpfs,1)],
      'email' => $faker->unique()->safeEmail,
      'phone' => $faker->phoneNumber,
      'defaulting' => rand(0,1)
    ];

});
 /*


 'data_nascimento' => ->nullable(),
 'sexo' => rand('f', 'm')->nullable(),
 'civil_state' => numberBetween($min = 1, $max = 3) ,
 'disabled' => str_random(20)->nullable(),
 'fantasy_name' => $faker->name->nullable(),


 */
