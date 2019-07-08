<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 07 Jul 2019 17:25:59 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Symbolism
 * 
 * @property int $id
 * @property string $gimn
 * @property string $gerb
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
		'gerb'
	];

    public function getGerb()
    {
        return asset('storage/symbolism/' . $this->gerb);
    }
}
