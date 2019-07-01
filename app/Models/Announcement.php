<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 26 Jun 2019 10:18:25 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Announcement
 * 
 * @property int $id
 * @property string $name
 * @property string $text
 * @property int $status
 * @property int $user_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Models\User $user
 *
 * @package App\Models
 */
class Announcement extends News
{
    const STATUS_UNACTIVE =0;
    const STATUS_ACTIVE =1;
	protected $casts = [
		'status' => 'int',
		'user_id' => 'int'
	];

	protected $fillable = [
		'name',
		'text',
		'status',
		'user_id'
	];

	public function user()
	{
		return $this->belongsTo(\App\Models\User::class);
	}

    public function getUrl()
    {
        return '/announcements/view/' . $this->url;
    }
}
