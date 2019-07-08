<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\RoleUser;
use App\Models\Setting;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $user;
    protected $role;
    protected $userName;

    public function __construct()
    {
        if (Auth::check()) {
            $this->user = Auth::user();
            $this->role = RoleUser::where('user_id', $this->user->id)->first();
            $this->userName =explode(' ', $this->user->full_name);
        }
    }
    protected function getSettings()
    {
        return [
            'email' => Setting::where('name', 'email')->first()->value,
            'phone' => Setting::where('name', 'phone')->first()->value,
            'address' => Setting::where('name', 'address')->first()->value,
        ];
    }

    public static function getStockMonth($month)
    {
        switch ($month){
            case '01':
                return 'Cічень';
                break;
            case '02':
                return 'Лютий';
                break;
            case '03':
                return 'Березень';
                break;
            case '04':
                return 'Квітень';
                break;
            case '05':
                return 'Травень';
                break;
            case '06':
                return 'Чрвень';
                break;
            case '07':
                return 'Липень';
                break;
            case '08':
                return 'Серпень';
                break;
            case '09':
                return 'Вересень';
                break;
            case 10:
                return 'Жовтень';
                break;
            case 11:
                return 'Листопад';
                break;
            case 12:
                return 'Грудень';
                break;
            default:
                return $month;
        }
    }

}
