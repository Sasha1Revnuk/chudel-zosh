<?php

namespace App\Http\Controllers;

use App\Models\Pride;
use App\Models\Setting;
use Illuminate\Http\Request;

class OurPride extends Controller
{
    public function index()
    {
        $data = [
            'settings' => $this->getSettings(),
            'userName' =>$this->userName,
            'user' => $this->user,
            'role' => $this->role,
            'title' => 'Наша гордість',
            'pride' => Pride::orderBy('created_at', 'desc')->paginate(Setting::where('name', 'newsOnPage')->first()->value)

        ];
        return view ('pride')->with(['data' => $data]);
    }
}
