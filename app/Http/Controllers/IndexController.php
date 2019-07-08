<?php

namespace App\Http\Controllers;

use App\Models\MainText;
use App\Models\RoleUser;
use App\Models\Symbolism;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class IndexController extends Controller
{

    public function index()
    {
        $data = [
            'settings' => $this->getSettings(),
            'userName' =>$this->userName,
            'user' => $this->user,
            'role' => $this->role,
            'title' => 'Головна',
            'symbolism' => Symbolism::first(),
            'mainText' => MainText::first()
        ];
        return view ('index')->with(['data' => $data]);
    }
}
