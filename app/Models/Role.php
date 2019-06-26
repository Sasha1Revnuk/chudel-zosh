<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 26 Jun 2019 10:17:21 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Role
 * 
 * @property int $id
 * @property string $name
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $users
 *
 * @package App\Models
 */
class Role extends Eloquent
{
	protected $fillable = [
		'name'
	];

	public function users()
	{
		return $this->belongsToMany(\App\Models\User::class)
					->withPivot('id')
					->withTimestamps();
	}
}
