<?php

use App\Entity\Comment;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
	return [
		'comment' => $faker->sentence,
		'user_id' => 1,
		'parent_id' => null,
	];
});