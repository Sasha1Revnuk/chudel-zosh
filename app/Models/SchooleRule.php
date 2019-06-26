<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 26 Jun 2019 10:20:28 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class SchooleRule
 * 
 * @property int $id
 * @property string $name
 * @property string $text
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @package App\Models
 */
class SchooleRule extends Eloquent
{
	protected $fillable = [
		'name',
		'text'
	];
}
