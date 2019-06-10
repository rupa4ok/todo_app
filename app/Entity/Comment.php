<?php

namespace App\Entity;

use App\User;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Entity\Comment
 *
 * @property int $id
 * @property string $comment
 * @property int $user_id
 * @property int $parent_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\User[] $children
 * @property-read \App\Entity\Todo $parent
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Comment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Comment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Comment query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Comment whereComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Comment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Comment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Comment whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Comment whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Comment whereUserId($value)
 * @mixin \Eloquent
 * @property string $name
 * @property int $completed
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Comment whereCompleted($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity\Comment whereName($value)
 */
class Comment extends Model
{
	protected $fillable = ['name', 'user_id', 'parent_id'];
	
	public function parent()
	{
		return $this->belongsTo(Todo::class, 'parent_id', 'id');
	}
	
	public function children()
	{
		return $this->hasMany(User::class, 'user_id', 'id');
	}
	
	public static function getReffer()
	{
		$url = explode("/",$_SERVER["HTTP_REFERER"]);
		return $url['4'];
	}
}
