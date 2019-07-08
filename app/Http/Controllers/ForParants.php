<?php

namespace App\Http\Controllers;

use App\Models\ForParent;
use Illuminate\Http\Request;

class ForParants extends Controller
{
    public function index()
    {
        $data = [
            'settings' => $this->getSettings(),
            'userName' =>$this->userName,
            'user' => $this->user,
            'role' => $this->role,
            'title' => 'Батькам',
            'documents' => ForParent::all()

        ];
        return view ('layouts.documents')->with(['data' => $data]);
    }
}
