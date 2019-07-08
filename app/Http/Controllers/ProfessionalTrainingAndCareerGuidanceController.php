<?php

namespace App\Http\Controllers;

use App\Models\ProfileLearn;
use Illuminate\Http\Request;

class ProfessionalTrainingAndCareerGuidanceController extends Controller
{
    public function index()
    {
        $data = [
            'settings' => $this->getSettings(),
            'userName' =>$this->userName,
            'user' => $this->user,
            'role' => $this->role,
            'title' => 'Профільне навчання та профорієнтація',
            'documents' => ProfileLearn::all()

        ];
        return view ('layouts.documents')->with(['data' => $data]);
    }
}
