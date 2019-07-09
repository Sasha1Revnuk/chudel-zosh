<?php

namespace App\Http\Controllers\Admin;

use App\Models\Archive;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArchiveController extends AdminController
{
    public function __construct()
    {
        parent::__construct();
        $this->src = 'archive';
    }

    public function index()
    {
        return view('admin.layouts.documents.index')->with([
            'title' => 'Архів',
            'userName' => $this->userName,
            'documents' => Archive::orderBy('created_at', 'desc')->paginate(15),
            'src' => $this->src
        ]);

    }

    public function add()
    {
        $document = new Archive();
        return view('admin.layouts.documents.form')->with([
            'title' => 'Додати посилання',
            'userName' => $this->userName,
            'document' => $document,
            'src' => $this->src
        ]);
    }

    public function edit($id)
    {
        $document = Archive::find($id);
        return view('admin.layouts.documents.form')->with([
            'title' => 'Редагувати посилання',
            'userName' => $this->userName,
            'document' => $document,
            'src' => $this->src
        ]);
    }

    public function save(Request $request)
    {
        $this->saveDocument($request, $request->get('id') ? Archive::find($request->get('id')) : new Archive());
        if($request->get('id')) {
            return redirect()->back();
        } else {
            return redirect('/adm/' . $this->src);
        }
    }

    public function delete($id)
    {
        $src = Archive::find($id);
        $this->deleteDocument($src);
        return redirect()->back();
    }
}
