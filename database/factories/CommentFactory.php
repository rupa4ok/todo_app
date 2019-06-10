<?php

use App\Entity\Comment;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
	return [
		'name' => $faker->sentence,
		'user_id' => 1,
		'parent_id' => random_int(1, 10),
		'completed' => random_int(0, 1)
	];
});