<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 26 Jun 2019 10:18:25 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Dpa
 * 
 * @property int $id
 * @property string $name
 * @property string $text
 * @property int $status
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @package App\Models
 */
class Dpa extends Eloquent
{
	protected $casts = [
		'status' => 'int'
	];

	protected $fillable = [
		'name',
		'text',
		'status'
	];
}
