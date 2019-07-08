<?php

namespace App\Http\Controllers;

use App\Models\EducationWork;
use Illuminate\Http\Request;

class EducationalWorkController extends Controller
{
    public function index()
    {
        $data = [
            'settings' => $this->getSettings(),
            'userName' =>$this->userName,
            'user' => $this->user,
            'role' => $this->role,
            'title' => 'Навчальна робота',
            'documents' => EducationWork::all()

        ];
        return view ('layouts.documents')->with(['data' => $data]);
    }
}
