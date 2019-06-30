<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Menu;
use Illuminate\Http\Request;

class DocumentsController extends Controller
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
            'title' => 'Документи',
            'banner' => $banner->banner != null ? $banner->banner : null,
            'documents' => Document::all()
        ];
        return view ('documents')->with(['data' => $data]);
    }
}
