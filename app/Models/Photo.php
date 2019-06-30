<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 26 Jun 2019 10:18:21 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Photo
 * 
 * @property int $id
 * @property string $name
 * @property int $album_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Models\Album $album
 *
 * @package App\Models
 */
class Photo extends Eloquent
{
	protected $casts = [
		'album_id' => 'int'
	];

	protected $fillable = [
		'name',
		'album_id'
	];

	public function album()
	{
		return $this->belongsTo(\App\Models\Album::class);
	}

    public function getImage()
    {
        return asset('storage/albums/' . $this->album_id . '/photos/' . $this->name);

    }
}
