<?php

namespace App\Entity;

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
 */
class Todo extends Model
{
	public const STATUS_TODO = 'todo';
	public const STATUS_DOING = 'doing';
	public const STATUS_DONE = 'done';
	
	protected $fillable = [
		'name', 'description', 'user_id', 'status',
	];
	
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
