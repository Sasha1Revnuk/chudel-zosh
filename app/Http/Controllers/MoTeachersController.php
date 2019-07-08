<?php

namespace App\Http\Controllers;

use App\Models\MoTeacher;
use App\Models\Setting;
use Illuminate\Http\Request;

class MoTeachersController extends Controller
{
    public function index()
    {
        $data = [
            'settings' => $this->getSettings(),
            'userName' =>$this->userName,
            'user' => $this->user,
            'role' => $this->role,
            'title' => 'МО вчителів',
            'mo_teachers' => MoTeacher::paginate(Setting::where('name', 'newsOnPage')->first()->value)

        ];
        return view ('mo_teachers')->with(['data' => $data]);
    }
}
