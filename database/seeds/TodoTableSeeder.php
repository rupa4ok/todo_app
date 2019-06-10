<?php

use App\Entity\Todo;
use Illuminate\Database\Seeder;

class TodoTableSeeder extends Seeder
{
	public function run(): void
	{
		factory(Todo::class, 10)->create();
	}
}