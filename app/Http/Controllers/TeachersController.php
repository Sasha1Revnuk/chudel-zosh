<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Teacher;
use App\Models\Teachertext;
use Illuminate\Http\Request;

class TeachersController extends Controller
{
    public function index(Request $request)
    {
        $banner = Menu::where('src', '/' . $request->route()->uri)->first();
        $data = [
            'settings' => $this->getSettings(),
            'menu' => $this->getMenu(),
            'userName' =>$this->userName,
            'user' => $this->user,
            'role' => $this->role,
            'title' => 'Адміністрація та вчителі',
            'banner' => $banner->banner != null ? $banner->banner : null,
            'freeText' => Teachertext::first(),
            'teachers' => Teacher::all()
        ];
        return view ('teachers')->with(['data' => $data]);
    }
}
