<?php

namespace App\Http\Controllers;

use App\Models\PublicInformations;
use Illuminate\Http\Request;

class PublicInformationController extends Controller
{
    public function index()
    {
        $data = [
            'settings' => $this->getSettings(),
            'userName' =>$this->userName,
            'user' => $this->user,
            'role' => $this->role,
            'title' => 'Публічна інформація',
            'documents' => PublicInformations::all()

        ];
        return view ('layouts.documents')->with(['data' => $data]);
    }
}
