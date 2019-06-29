<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Symbolism;
use Illuminate\Http\Request;

class SymbolismController extends Controller
{

    public function index(Request $request)
    {
        $banner = Menu::where('src', $request->server->get('PATH_INFO'))->first();
        $data = [
            'settings' => $this->getSettings(),
            'menu' => $this->getMenu(),
            'userName' =>$this->userName,
            'user' => $this->user,
            'role' => $this->role,
            'title' => 'Візитка школи',
            'banner' => $banner->banner != 0 ? $banner->banner : null,
            'symbolism' => Symbolism::first()
        ];
        return view ('symbolism')->with(['data' => $data]);
    }
}
