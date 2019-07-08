<?php

namespace App\Http\Controllers;

use App\Models\Zno;
use Illuminate\Http\Request;

class ZnoDpaController extends Controller
{
    public function index()
    {
        $data = [
            'settings' => $this->getSettings(),
            'userName' =>$this->userName,
            'user' => $this->user,
            'role' => $this->role,
            'title' => 'ДПА і ЗНО',
            'documents' => Zno::all()

        ];
        return view ('layouts.documents')->with(['data' => $data]);
    }
}
