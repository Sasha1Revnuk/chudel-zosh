<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 30 Jun 2019 08:47:44 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Teachertext
 * 
 * @property int $id
 * @property string $text
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @package App\Models
 */
class Teachertext extends Eloquent
{
	protected $table = 'teachertext';

	protected $fillable = [
		'text'
	];
}
