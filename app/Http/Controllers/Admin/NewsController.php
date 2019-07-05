<?php

namespace App\Http\Controllers\Admin;

use App\Models\News;
use App\Utils;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\UploadedFile;

class NewsController extends AdminController
{
    public function index()
    {
        return view('admin.news.index')->with([
            'title' => 'Новини',
            'userName' => $this->userName,
            'news' => News::orderBy('created_at', 'desc')->paginate(15)
        ]);

    }

    public function add()
    {
        $news = new News();
        return view('admin.news.form')->with([
            'title' => 'Додати новину',
            'userName' => $this->userName,
            'news' => $news,
        ]);
    }

    public function edit($id)
    {
        $news = News::where('status', News::STATUS_ACTIVE)->find($id);
        return view('admin.news.form')->with([
            'title' => 'Редагувати новину',
            'userName' => $this->userName,
            'news' => $news,
        ]);
    }

    public function save(Request $request)
    {
        $this->validate($request, [
            'text' => 'required',
            'description' => 'required',
        ]);

        if(!$request->get('id')) {
            $this->validate($request, [
                'name' => 'required|unique:news',
            ]);
        } else {
            $this->validate($request, [
                'name' => 'required|',
            ]);
        }
        DB::transaction(function() use ($request) {
            $news = $request->get('id') ? News::where('status', News::STATUS_ACTIVE)->find($request->get('id')) : new News();
            $news->name = $request->get('name');
            $news->url = Utils::transliterate($request->get('name'));
            $news->text = $request->get('text');
            $news->description = $request->get('description');
            $news->user_id = $this->user->id;
            $news->save();
            if ($request->file('image')) {
                $news->image = $this->saveImage($request, $news);
                $news->save();
            }


        });

        return redirect()->back();
    }

    public function delete($id)
    {
        $news = News::find($id);
        if($news) {
            File::deleteDirectory(storage_path('app/public/news/'. $news->id));
            $news->delete();
        }
        return redirect()->back();
    }

    protected function saveImage(Request $request, News $news)
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
        $folderPath = storage_path('app/public/news/'.$folder);
        File::deleteDirectory($folderPath);
        $file->move($folderPath, $fileName);
        $filePath = $folderPath . '/' . $fileName;
        $this->resizeFile($filePath, 250);

        return $fileName;
    }

    public function access($id)
    {
        $news = News::find($id);
        if($news) {
           if($news->status == News::STATUS_ACTIVE) {
               $news->status = News::STATUS_UNACTIVE;
           } else {
               $news->status = News::STATUS_ACTIVE;
           }
           $news->update();
        }
        return redirect()->back();
    }
}
