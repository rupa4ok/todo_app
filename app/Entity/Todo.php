<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Entity\Todo
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Todo newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Todo newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Todo query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Todo whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Todo whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Todo whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Todo whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Todo whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Todo whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property int $user_id
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Todo whereUserId($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Entity\Comment[] $comments
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Todo list()
 */
class Todo extends Model
{
	public const STATUS_TODO = 0;
	public const STATUS_DOING = 1;
	public const STATUS_DONE = 2;
	
	protected $fillable = [
		'name', 'description', 'user_id', 'status',
	];
	
	public function scopeList(Builder $query)
	{
		return $query->with('comments')
			->withCount('comments')
			->orderByDesc('created_at')
			->get()
			->where('user_id', 1)
			->groupBy('status')
			->sortKeys();
	}
	
	public static function statusList(): array
	{
		return [
			self::STATUS_TODO => 'todo',
			self::STATUS_DOING => 'doing',
			self::STATUS_DONE => 'done',
		];
	}
	
	public function comments()
	{
		return $this->hasMany(Comment::class, 'parent_id', 'id');
	}
	
	public function isTodo(): bool
	{
		return $this->status === self::STATUS_TODO;
	}
	
	public function isDoing(): bool
	{
		return $this->status === self::STATUS_DOING;
	}
	
	public function isDone(): bool
	{
		return $this->status === self::STATUS_DONE;
	}
}
