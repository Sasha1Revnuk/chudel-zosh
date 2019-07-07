<?php

namespace App\Http\Controllers\Admin;

use App\Models\Symbolism;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManagerStatic as Image;

class SymbolismController extends AdminController
{
    public function index()
    {
        return view('admin.symbolism.index')->with([
            'title' => 'Символіка',
            'userName' => $this->userName,
            'symbolism' => Symbolism::first()
        ]);

    }

    public function save(Request $request)
    {
        $this->validate($request, [
            'gimn' => 'required',
        ]);
        DB::transaction(function() use ($request) {
            $symbolism = Symbolism::find($request->get('id'));
            $symbolism->gimn = $request->get('gimn');
            $symbolism->save();
            if($request->file('gerb')){
                $symbolism->gerb = $this->saveSymbolic($request, $symbolism, 'gerb');
                $symbolism->save();
            }


        });

        return redirect('/adm/symbolism');
    }

    protected function saveSymbolic(Request $request, Symbolism $symbolism, $name)
    {
        $file = $request->file($name);
        if ($file) {
            return $this->uploadImage($file, $name);
        } else {
            return $symbolism->gerb;
        }
    }

    protected function uploadImage(UploadedFile $file, $name)
    {
        $extension = $file->getClientOriginalExtension();
        $fileName = $name . '.' . $extension;
        $folderPath = storage_path('app/public/symbolism');
        $file->move($folderPath, $fileName);
        $filePath = $folderPath . '/' . $fileName;
        if(getimagesize($filePath)[0] > 300) {
            $this->resizeSymbolic($filePath, 300);
        }
        if(getimagesize($filePath)[0] > 250) {
            $this->resizeFile($filePath, 250);
        } else {
            $this->resizeFile($filePath, getimagesize($filePath)[0]);

        }

        return $fileName;
    }

    public function resizeSymbolic($filePath, $width)
    {
        $image = Image::make($filePath);
        $image->interlace(true);
        $image->save();

        $image->resize($width, null, function ($constraint) {
            $constraint->aspectRatio();
        });
        $image->interlace(true);
        $image->save($filePath);
    }
}
