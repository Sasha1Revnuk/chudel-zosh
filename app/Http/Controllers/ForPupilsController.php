<?php

namespace App\Http\Controllers;

use App\Models\ForStudent;
use Illuminate\Http\Request;

class ForPupilsController extends Controller
{
    public function index()
    {
        $data = [
            'settings' => $this->getSettings(),
            'userName' =>$this->userName,
            'user' => $this->user,
            'role' => $this->role,
            'title' => 'Учням',
            'documents' => ForStudent::all()

        ];
        return view ('layouts.documents')->with(['data' => $data]);
    }
}
