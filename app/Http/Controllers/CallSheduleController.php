<?php

namespace App\Http\Controllers;

use App\Models\CallShedule;
use App\Models\Menu;
use Illuminate\Http\Request;

class CallSheduleController extends Controller
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
            'title' => 'Розклад дзвінків',
            'banner' => $banner->banner != null ? $banner->banner : null,
            'callShedule' => CallShedule::first()
        ];
        return view ('callShedule')->with(['data' => $data]);
    }
}
