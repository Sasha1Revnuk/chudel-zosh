<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 26 Jun 2019 10:17:16 +0000.
 */

namespace App\Models;


use Reliese\Database\Eloquent\Model as Eloquent;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;


/**
 * Class User
 * 
 * @property int $id
 * @property string $full_name
 * @property string $email
 * @property \Carbon\Carbon $email_verified_at
 * @property string $password
 * @property int $role_id
 * @property string $remember_token
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $announcements
 * @property \Illuminate\Database\Eloquent\Collection $news
 * @property \Illuminate\Database\Eloquent\Collection $roles
 *
 * @package App\Models
 */
class User extends Eloquent implements Authenticatable
{

    use AuthenticableTrait;

    const ROLE_ADMIN = 1;
    const ROLE_USER = 2;
    const ROLE_ROOT = 3;
	protected $casts = [
		'role_id' => 'int'
	];

	protected $dates = [
		'email_verified_at'
	];

	protected $hidden = [
		'password',
		'remember_token'
	];

	protected $fillable = [
		'full_name',
		'email',
		'email_verified_at',
		'password',
		'role_id',
		'remember_token'
	];

	public function announcements()
	{
		return $this->hasMany(\App\Models\Announcement::class);
	}

	public function news()
	{
		return $this->hasMany(\App\Models\News::class);
	}

	public function roles()
	{
		return $this->belongsToMany(\App\Models\Role::class)
					->withPivot('id')
					->withTimestamps();
	}
}
