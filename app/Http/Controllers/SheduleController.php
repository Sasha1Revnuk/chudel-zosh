<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Shedule;
use Illuminate\Http\Request;

class SheduleController extends Controller
{
    public function index(Request $request)
    {
        $banner = Menu::where('src', '/' . $request->route()->uri)->first();
        $data = [
            'settings' => $this->getSettings(),
            'menu' => $this->getMenu(),
            'userName' =>$this->userName,
            'user' => $this->user,
            'role' => $this->role,
            'title' => 'Розклад уроків',
            'banner' => $banner->banner != null ? $banner->banner : null,
            'shedule' => Shedule::first()
        ];
        return view ('shedule')->with(['data' => $data]);
    }
}
