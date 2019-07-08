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
        'url',
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
                return 'січня';
                break;
            case 'February':
                return 'лютого';
                break;
            case 'March':
                return 'березня';
                break;
            case 'April':
                return 'квітня';
                break;
            case 'May':
                return 'травня';
                break;
            case 'June':
                return 'червня';
                break;
            case 'July':
                return 'липня';
                break;
            case 'August':
                return 'серпня';
                break;
            case 'September':
                return 'вересня';
                break;
            case 'October':
                return 'жовтня';
                break;
            case 'November':
                return 'листопада';
                break;
            case 'December':
                return 'грудня';
                break;
            default:
                return $month;
        }
    }



    public function getUrl()
    {
        return '/news/view/' . $this->url;
    }

    public function getThumbnail()
    {
        $image = explode('.', $this->image);
        if(isset($image[1])) {
            return asset('storage/news/' . $this->id . '/' . $this->image . '_thumbnail.' . $image[1]);
        }
    }
}
