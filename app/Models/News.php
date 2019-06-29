<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 26 Jun 2019 10:18:25 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class News
 * 
 * @property int $id
 * @property string $name
 * @property string $image
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
class News extends Eloquent
{
    const STATUS_UNACTIVE =0;
    const STATUS_ACTIVE =1;
	protected $casts = [
		'status' => 'int',
		'user_id' => 'int'
	];

	protected $fillable = [
		'name',
		'image',
		'text',
		'status',
		'user_id',
        'description'
	];

	public function user()
	{
		return $this->belongsTo(\App\Models\User::class);
	}

	public function getImage()
    {
        return asset('storage/news/' . $this->id . '/' . $this->image);

    }

    public function getMonth($month)
    {
        switch ($month){
            case 'January':
                return 'Cічня';
                break;
            case 'February':
                return 'Лютого';
                break;
            case 'March':
                return 'Березня';
                break;
            case 'April':
                return 'Квітня';
                break;
            case 'May':
                return 'Травня';
                break;
            case 'June':
                return 'Червня';
                break;
            case 'July':
                return 'Липня';
                break;
            case 'August':
                return 'Серпня';
                break;
            case 'September':
                return 'Вересня';
                break;
            case 'October':
                return 'Жовтня';
                break;
            case 'November':
                return 'Листопада';
                break;
            case 'December':
                return 'Грудня';
                break;
            default:
                return $month;
        }
    }
}
