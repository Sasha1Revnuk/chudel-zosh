<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 26 Jun 2019 10:21:01 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Shedule
 * 
 * @property int $id
 * @property string $name
 * @property string $text
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @package App\Models
 */
class Shedule extends Eloquent
{
	protected $fillable = [
		'name',
		'text'
	];
}
