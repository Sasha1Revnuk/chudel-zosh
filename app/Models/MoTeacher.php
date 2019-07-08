<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 08 Jul 2019 09:47:15 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class MoTeacher
 * 
 * @property int $id
 * @property string $name
 * @property string $src
 * @property string $image
 * @property string $description
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @package App\Models
 */
class MoTeacher extends Eloquent
{
	protected $fillable = [
		'name',
		'src',
		'image',
		'description'
	];

    public function getImage()
    {
        return asset('storage/mo_teachers/' . $this->id . '/' . $this->image);
    }

    public function getThumbnail()
    {
        $image = explode('.', $this->image);
        if(isset($image[1])) {
            return asset('storage/mo_teachers/' . $this->id . '/' . $this->image . '_thumbnail.' . $image[1]);
        }
    }

}
