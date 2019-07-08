<?php

namespace App\Http\Controllers;

use App\Models\Atestation;
use Illuminate\Http\Request;

class AtestationController extends Controller
{
    public function index()
    {
        $data = [
            'settings' => $this->getSettings(),
            'userName' =>$this->userName,
            'user' => $this->user,
            'role' => $this->role,
            'title' => 'Атестація',
            'documents' => Atestation::all()

        ];
        return view ('layouts.documents')->with(['data' => $data]);
    }
}
