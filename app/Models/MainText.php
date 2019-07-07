<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 07 Jul 2019 17:26:07 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class MainText
 * 
 * @property int $id
 * @property string $banner_label
 * @property string $history
 * @property string $teachers
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @package App\Models
 */
class MainText extends Eloquent
{
	protected $fillable = [
		'banner_label',
		'history',
		'teachers'
	];
}
