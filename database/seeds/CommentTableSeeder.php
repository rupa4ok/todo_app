<?php

use App\Entity\Comment;
use Illuminate\Database\Seeder;

class CommentTableSeeder extends Seeder
{
	public function run(): void
	{
		factory(Comment::class, 1000)->create();
	}
}