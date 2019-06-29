<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Symbolism;
use Illuminate\Http\Request;

class SymbolismController extends Controller
{
    public function index(Request $request)
    {
        $data = [
            'settings' => $this->getSettings(),
            'menu' => $this->getMenu(),
            'userName' =>$this->userName,
            'user' => $this->user,
            'role' => $this->role,
            'title' => 'Візитка школи',
            'banner' => Menu::where('src', $request->server->get('PATH_INFO'))->first()->banner,
            'symbolism' => Symbolism::first()
        ];
        return view ('symbolism')->with(['data' => $data]);
    }
}
