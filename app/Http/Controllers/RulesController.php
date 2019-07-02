<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\SchooleRule;
use Illuminate\Http\Request;

class RulesController extends Controller
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
            'title' => 'Правила поведінки',
            'banner' => $banner->banner != null ? $banner->banner : null,
            'rules' => SchooleRule::first()
        ];
        return view ('rules')->with(['data' => $data]);
    }
}
