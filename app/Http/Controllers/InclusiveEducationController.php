<?php

namespace App\Http\Controllers;

use App\Models\InclusiveWork;
use Illuminate\Http\Request;

class InclusiveEducationController extends Controller
{
    public function index()
    {
        $data = [
            'settings' => $this->getSettings(),
            'userName' =>$this->userName,
            'user' => $this->user,
            'role' => $this->role,
            'title' => 'Інклюзивне навчання',
            'documents' => InclusiveWork::all()

        ];
        return view ('layouts.documents')->with(['data' => $data]);
    }
}
