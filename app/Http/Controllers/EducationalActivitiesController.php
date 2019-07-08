<?php

namespace App\Http\Controllers;

use App\Models\EducationWork;
use App\Models\VihovWork;
use Illuminate\Http\Request;

class EducationalActivitiesController extends Controller
{
    public function index()
    {
        $data = [
            'settings' => $this->getSettings(),
            'userName' =>$this->userName,
            'user' => $this->user,
            'role' => $this->role,
            'title' => 'Виховна робота',
            'documents' => VihovWork::all()

        ];
        return view ('layouts.documents')->with(['data' => $data]);
    }
}
