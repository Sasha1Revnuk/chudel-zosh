<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 29 Jun 2019 09:05:58 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Banner
 * 
 * @property int $id
 * @property string $image
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @package App\Models
 */
class Banner extends Eloquent
{
	protected $fillable = [
		'image'
	];

	public function getImage()
    {
        return asset('storage/banners/' . $this->id . '/' . $this->image);
    }
}
