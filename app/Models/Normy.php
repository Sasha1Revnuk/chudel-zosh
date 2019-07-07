<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 07 Jul 2019 18:04:13 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Normy
 * 
 * @property int $id
 * @property string $name
 * @property string $src
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @package App\Models
 */
class Normy extends Eloquent
{
	protected $table = 'normys';

	protected $fillable = [
		'name',
		'src'
	];
}
