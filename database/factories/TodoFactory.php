<?php

use App\Entity\Todo;
use Faker\Generator as Faker;

$factory->define(Todo::class, function (Faker $faker) {
	return [
		'name' => $faker->sentence,
		'description' => $faker->paragraph,
		'status' => $faker->randomElement([Todo::STATUS_DONE, Todo::STATUS_DOING, Todo::STATUS_TODO]),
		'user_id' => 1
	];
});