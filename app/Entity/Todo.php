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
 */
class Todo extends Model
{
	protected $fillable = [
		'name', 'email', 'password',
	];
}
