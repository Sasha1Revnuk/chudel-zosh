<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 26 Jun 2019 10:21:32 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Zno
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
class Zno extends News
{
    const STATUS_UNACTIVE =0;
    const STATUS_ACTIVE =1;
	protected $casts = [
		'status' => 'int'
	];

	protected $fillable = [
		'name',
        'url',
		'text',
		'status'
	];

    public function getUrl()
    {
        return '/zno/view/' . $this->url;
    }
}
