<?php

use Faker\Generator as Faker;

$factory->define(\App\Client::class, function (Faker $faker) {

  $denied = array("-", " ", "+", ".", "(", ")", "x");
  $document = str_replace($denied, "", $faker->phoneNumber);

    return [
      'name' => $faker->name,
      'document' => $document,
      'email' => $faker->safeEmail,
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
