<?php

namespace App\Http\Controllers;

use App\Models\History;
use App\Models\Menu;
use Illuminate\Http\Request;

class HistoryController extends Controller
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
            'title' => 'Історія школи',
            'banner' => $banner->banner != null ? $banner->banner : null,
            'history' => History::first()
        ];
        return view ('history')->with(['data' => $data]);
    }
}
