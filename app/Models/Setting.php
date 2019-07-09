<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 26 Jun 2019 10:20:44 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Setting
 * 
 * @property int $id
 * @property string $name
 * @property string $value
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @package App\Models
 */
class Setting extends Eloquent
{
    const TYPE_STRING = 1;
    const TYPE_NUMBER = 2;
	protected $fillable = [
		'name',
		'value'
	];
}
