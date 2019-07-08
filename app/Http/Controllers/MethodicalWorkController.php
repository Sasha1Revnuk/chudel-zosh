<?php

namespace App\Http\Controllers;

use App\Models\MethodicalWork;
use Illuminate\Http\Request;

class MethodicalWorkController extends Controller
{
    public function index()
    {
        $data = [
            'settings' => $this->getSettings(),
            'userName' =>$this->userName,
            'user' => $this->user,
            'role' => $this->role,
            'title' => 'Методична робота',
            'documents' => MethodicalWork::all()

        ];
        return view ('layouts.documents')->with(['data' => $data]);
    }
}
