<?php

namespace App\Entity;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
	protected $fillable = ['comment', 'user_id', 'parent_id'];
	
	public function parent()
	{
		return $this->belongsTo(Todo::class, 'parent_id', 'id');
	}
	
	public function children()
	{
		return $this->hasMany(User::class, 'user_id', 'id');
	}
}
