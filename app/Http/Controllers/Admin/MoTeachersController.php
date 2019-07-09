<?php

namespace App\Http\Controllers\Admin;

use App\Models\MoTeacher;
use App\Utils;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class MoTeachersController extends AdminController
{
    public function index()
    {
        return view('admin.moTeacher.index')->with([
            'title' => 'МО вчителів',
            'userName' => $this->userName,
            'moTeachers' => MoTeacher::orderBy('created_at', 'desc')->paginate(15)
        ]);

    }

    public function add()
    {
        $moTeacher = new MoTeacher();
        return view('admin.moTeacher.form')->with([
            'title' => 'Додати методичне об\'эднання',
            'userName' => $this->userName,
            'moTeacher' => $moTeacher,
        ]);
    }

    public function edit($id)
    {
        $moTeacher = MoTeacher::find($id);
        return view('admin.moTeacher.form')->with([
            'title' => 'Редагувати новину',
            'userName' => $this->userName,
            'moTeacher' => $moTeacher,
        ]);
    }

    public function save(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'src' => 'required',
        ]);

        DB::transaction(function() use ($request) {
            $moTeacher = $request->get('id') ? MoTeacher::find($request->get('id')) : new MoTeacher();
            $moTeacher->name = $request->get('name');
            $moTeacher->src = $request->get('src');
            $moTeacher->description = $request->get('description');
            $moTeacher->save();
            if ($request->file('image')) {
                $moTeacher->image = $this->saveImage($request, $moTeacher);
                $moTeacher->save();
            }


        });
        if($request->get('id')) {
            return redirect()->back();
        } else {
            return redirect('/adm/mo-teachers');
        }

    }

    public function delete($id)
    {
        $moTeacher = MoTeacher::find($id);
        if($moTeacher) {
            File::deleteDirectory(storage_path('app/public/mo_teachers/'. $moTeacher->id));
            $moTeacher->delete();
        }
        return redirect()->back();
    }

    protected function saveImage(Request $request, MoTeacher $moTeacher)
    {
        $file = $request->file('image');
        if ($file) {
            return $this->uploadImage($file, Utils::transliterate($moTeacher->name), $moTeacher->id);
        }
    }

    protected function uploadImage(UploadedFile $file, $name, $folder)
    {
        $extension = $file->getClientOriginalExtension();
        $fileName = $name . '.' . $extension;
        $folderPath = storage_path('app/public/mo_teachers/'.$folder);
        File::deleteDirectory($folderPath);
        $file->move($folderPath, $fileName);
        $filePath = $folderPath . '/' . $fileName;
        $this->resizeFile($filePath, 250);

        return $fileName;
    }

}
