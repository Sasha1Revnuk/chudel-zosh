<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 26 Jun 2019 10:18:25 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class MethodicalWork
 * 
 * @property int $id
 * @property string $name
 * @property string $text
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @package App\Models
 */
class MethodicalWork extends News
{
	protected $fillable = [
		'name',
        'url',
		'text'
	];

    public function getUrl()
    {
        return '/methodical-works/view/' . $this->url;
    }
}
