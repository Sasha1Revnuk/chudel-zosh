<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 07 Jul 2019 17:26:27 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Zno
 * 
 * @property int $id
 * @property string $name
 * @property string $src
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @package App\Models
 */
class Zno extends Eloquent
{
	protected $fillable = [
		'name',
		'src'
	];
}
