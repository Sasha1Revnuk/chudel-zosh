<?php

namespace App\Http\Controllers\Admin;

use App\Models\Banner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class SliderController extends AdminController
{
    public function index()
    {
        return view('admin.sliders.index')->with([
            'title' => 'Слайдер на головній сторінці',
            'userName' => $this->userName,
            'sliders' => Banner::all()
            ]);

    }

    public function add()
    {
        $slider = new Banner();
        return view('admin.sliders.form')->with([
            'title' => 'Додати зображення',
            'userName' => $this->userName,
            'slider' => $slider,
        ]);    }

    public function edit($id)
    {
        $slider = Banner::find($id);
        return view('admin.sliders.form')->with([
            'title' => 'Редагувати зображення',
            'userName' => $this->userName,
            'slider' => $slider,
        ]);
    }

    public function save(Request $request)
    {
        if( !$request->get('id') )
        {
            $this->validate($request, [
                'image' => 'required',
            ]);
        }
        DB::transaction(function() use ($request) {
            $slider = $request->get('id') ? Banner::find($request->get('id')) : new Banner();
            $slider->save();
            $slider->image = $this->saveImage($request, $slider);
            $slider->save();

        });

        return redirect('/adm/slider');
    }

    public function delete($id)
    {
        $slider = Banner::find($id);
        if($slider) {
            File::deleteDirectory(storage_path('app/public/banners/'. $slider->id));
            $slider->delete();
        }
        return redirect()->back();
    }

    protected function saveImage(Request $request, Banner $slider)
    {
        $file = $request->file('image');
        if ($file) {
            return $this->uploadImage($file, 'slider_' . Str::random(3), $slider->id);
        } else {
            return $slider->image;
        }
    }

    protected function uploadImage(UploadedFile $file, $name, $folder)
    {
        $extension = $file->getClientOriginalExtension();
        $fileName = $name . '.' . $extension;
        $folderPath = storage_path('app/public/banners/'.$folder);
        File::deleteDirectory($folderPath);
        $file->move($folderPath, $fileName);
        $filePath = $folderPath . '/' . $fileName;
        $this->resizeFile($filePath, 250);

        return $fileName;
    }
}
