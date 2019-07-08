<?php

namespace App\Http\Controllers;

use App\Models\Nush;
use Illuminate\Http\Request;

class NushController extends Controller
{
    public function index()
    {
        $data = [
            'settings' => $this->getSettings(),
            'userName' =>$this->userName,
            'user' => $this->user,
            'role' => $this->role,
            'title' => 'НУШ',
            'documents' => Nush::all()

        ];
        return view ('layouts.documents')->with(['data' => $data]);
    }
}
