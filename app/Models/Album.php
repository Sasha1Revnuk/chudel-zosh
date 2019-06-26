<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 26 Jun 2019 10:18:25 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Album
 * 
 * @property int $id
 * @property string $name
 * @property string $image
 * @property int $status
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $photos
 *
 * @package App\Models
 */
class Album extends Eloquent
{
	protected $casts = [
		'status' => 'int'
	];

	protected $fillable = [
		'name',
		'image',
		'status'
	];

	public function photos()
	{
		return $this->hasMany(\App\Models\Photo::class);
	}
}
