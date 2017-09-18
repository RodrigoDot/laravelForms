<?php

use Faker\Generator as Faker;

$factory->define(\App\Client::class, function (Faker $faker) {
      return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'phone' => $faker->phoneNumber,
        'defaulting' => rand(0,1)
      ];
  });

$factory->state(\App\Client::class, 'pessoa_fisica', function(Faker $faker) {
    $denied = array("-", " ", "+", ".", "(", ")", "x");
    $cpf = str_replace($denied, "", $faker->phoneNumber);
      return [
        'document' => $cpf,
        'born' => $faker->date(),
        'genre' => rand(1, 2) == 1 ? 'm' : 'f',
        'civil_state' => rand(1, 3),
        'disabled' => $faker->word
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
