<?php

namespace App\Http\Controllers;

use App\Models\Normy;
use Illuminate\Http\Request;

class NormyController extends Controller
{
    public function index()
    {
        $data = [
            'settings' => $this->getSettings(),
            'userName' =>$this->userName,
            'user' => $this->user,
            'role' => $this->role,
            'title' => 'Документи',
            'documents' => Normy::all()

        ];
        return view ('layouts.documents')->with(['data' => $data]);
    }
}
