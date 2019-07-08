<?php

namespace App\Http\Controllers;

use App\Models\CivilSafe;
use Illuminate\Http\Request;

class CivilSaveController extends Controller
{
    public function index()
    {
        $data = [
            'settings' => $this->getSettings(),
            'userName' =>$this->userName,
            'user' => $this->user,
            'role' => $this->role,
            'title' => 'Цивілний захист',
            'documents' => CivilSafe::all()

        ];
        return view ('layouts.documents')->with(['data' => $data]);
    }
}
