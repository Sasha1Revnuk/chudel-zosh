<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 26 Jun 2019 10:21:20 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Teacher
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
class Teacher extends Eloquent
{
	protected $fillable = [
		'name',
		'image',
		'text'
	];
}
