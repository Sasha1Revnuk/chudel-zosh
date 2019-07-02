<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Menu;
use App\Models\Setting;
use Illuminate\Http\Request;

class PhotoController extends Controller
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
            'title' => 'Галерея',
            'banner' => $banner->banner != null ? $banner->banner : null,
            'albums' => Album::where('status', Album::STATUS_ACTIVE)->orderBy('created_at', 'desc')->paginate(Setting::where('name', 'albumsOnPage')->first()->value),
        ];
        return view ('albums')->with(['data' => $data]);
    }

    public function albums($id)
    {
        $album = Album::with('photos')->find($id);
        if (!$album) {
            return redirect('/gallery');
        }
        $data = [
            'settings' => $this->getSettings(),
            'menu' => $this->getMenu(),
            'userName' =>$this->userName,
            'user' => $this->user,
            'role' => $this->role,
            'title' => 'Галерея | ' . $album->name,
            'banner' => null,
            'albums' => $album
        ];
        return view ('albums.view')->with(['data' => $data]);
    }
}
