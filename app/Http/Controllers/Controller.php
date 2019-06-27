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

    protected function getMenu()
    {
        $menu = [];
        $menuCollection = Menu::where('parent_id', 0)->get();

        foreach ($menuCollection as $item) {
            if($item->src != 'parent') {
                $menu[] = [
                    'name' => $item->name,
                    'src' => $item->src
                ];
            } else {
                $childCollection = Menu::where('parent_id', $item->id)->get();
                $parentArray = [];
                foreach ($childCollection as $child) {
                    $parentArray[] = [
                        'name' => $child->name,
                        'src' => $child->src
                    ];
                }
                $menu[] = [
                    'name' => $item->name,
                    'src' => $parentArray
                ];

            }
        }

        return $menu;
    }
}
