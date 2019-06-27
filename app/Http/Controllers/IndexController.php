<?php

namespace App\Http\Controllers;

use App\Models\RoleUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class IndexController extends Controller
{

    public function index()
    {
        $data = [
            'settings' => $this->getSettings(),
            'menu' => $this->getMenu(),
            'userName' =>$this->userName,
            'user' => $this->user,
            'role' => $this->role
        ];
        return view ('layouts.index')->with(['data' => $data]);
    }
}
