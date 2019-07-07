<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 07 Jul 2019 17:27:21 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class InclusiveWork
 * 
 * @property int $id
 * @property string $name
 * @property string $text
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @package App\Models
 */
class InclusiveWork extends Eloquent
{
	protected $fillable = [
		'name',
		'text'
	];
}
