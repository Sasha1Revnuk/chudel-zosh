<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 26 Jun 2019 10:21:11 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Symbolism
 * 
 * @property int $id
 * @property string $gimn
 * @property string $gerb
 * @property string $emblem
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @package App\Models
 */
class Symbolism extends Eloquent
{
	protected $table = 'symbolism';

	protected $fillable = [
		'gimn',
		'gerb',
		'emblem'
	];

	public function getGerb()
    {
        return asset('storage/symbolism/' . $this->gerb);
    }
    public function getEmblem()
    {
        return asset('storage/symbolism/' . $this->emblem);
    }
    public function getThumbnailEmblem()
    {
        $image = explode('.', $this->emblem);
        if($image) {
            return asset('storage/symbolism/' . $this->emblem . '_thumbnail.' . $image[1]);
        }
    }
    public function getThumbnailGerb()
    {
        $image = explode('.', $this->gerb);
        if($image) {
            return asset('storage/symbolism/' . $this->gerb . '_thumbnail.' . $image[1]);
        }
    }
}
