<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 07 Jul 2019 17:28:15 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Pride
 * 
 * @property int $id
 * @property string $name
 * @property string $image
 * @property string $text
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @package App\Models
 */
class Pride extends Eloquent
{
	protected $fillable = [
		'name',
		'image',
		'text'
	];
}
