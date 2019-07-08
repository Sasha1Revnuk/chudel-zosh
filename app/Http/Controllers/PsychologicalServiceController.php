<?php

namespace App\Http\Controllers;

use App\Models\PsychologicWork;
use Illuminate\Http\Request;

class PsychologicalServiceController extends Controller
{
    public function index()
    {
        $data = [
            'settings' => $this->getSettings(),
            'userName' =>$this->userName,
            'user' => $this->user,
            'role' => $this->role,
            'title' => 'Психологічна служба',
            'documents' => PsychologicWork::all()

        ];
        return view ('layouts.documents')->with(['data' => $data]);
    }
}
