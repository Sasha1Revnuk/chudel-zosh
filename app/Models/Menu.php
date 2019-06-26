<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 26 Jun 2019 10:18:25 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Menu
 * 
 * @property int $id
 * @property string $name
 * @property string $src
 * @property int $parent_id
 * @property int $status
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @package App\Models
 */
class Menu extends Eloquent
{
	protected $casts = [
		'parent_id' => 'int',
		'status' => 'int'
	];

	protected $fillable = [
		'name',
		'src',
		'parent_id',
		'status'
	];
}
