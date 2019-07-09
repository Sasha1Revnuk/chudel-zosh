<?php

namespace App\Http\Controllers\Admin;

use App\Models\Pride;
use App\Utils;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class OurPrideController extends AdminController
{
    public function index()
    {
        return view('admin.pride.index')->with([
            'title' => 'Наша гордість',
            'userName' => $this->userName,
            'prides' => Pride::orderBy('created_at', 'desc')->paginate(15)
        ]);

    }

    public function add()
    {
        $pride = new Pride();
        return view('admin.pride.form')->with([
            'title' => 'Додати гордість',
            'userName' => $this->userName,
            'pride' => $pride,
        ]);
    }

    public function edit($id)
    {
        $pride = Pride::find($id);
        return view('admin.pride.form')->with([
            'title' => 'Редагувати гордість',
            'userName' => $this->userName,
            'pride' => $pride,
        ]);
    }

    public function save(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'text' => 'required',
        ]);

        $text = str_replace('https://drive.google.com/file/d/', 'https://docs.google.com/uc?id=', $request->get('text'));
        $text = str_replace('/view?usp=sharing', ' ', $text);
        DB::transaction(function() use ($request, $text) {
            $pride = $request->get('id') ? Pride::find($request->get('id')) : new Pride();
            $pride->name = $request->get('name');
            $pride->text = $text;
            $pride->save();
            if ($request->file('image')) {
                $pride->image = $this->saveImage($request, $pride);
                $pride->save();
            }


        });
        if($request->get('id')) {
            return redirect()->back();
        } else {
            return redirect('/adm/our-pride');
        }

    }

    public function delete($id)
    {
        $pride = Pride::find($id);
        if($pride) {
            File::deleteDirectory(storage_path('app/public/pride/'. $pride->id));
            $pride->delete();
        }
        return redirect()->back();
    }

    protected function saveImage(Request $request, Pride $news)
    {
        $file = $request->file('image');
        if ($file) {
            return $this->uploadImage($file, Utils::transliterate($news->name), $news->id);
        }
    }

    protected function uploadImage(UploadedFile $file, $name, $folder)
    {
        $extension = $file->getClientOriginalExtension();
        $fileName = $name . '.' . $extension;
        $folderPath = storage_path('app/public/pride/'.$folder);
        File::deleteDirectory($folderPath);
        $file->move($folderPath, $fileName);
        $filePath = $folderPath . '/' . $fileName;
        $this->resizeFile($filePath, 250);

        return $fileName;
    }

}
