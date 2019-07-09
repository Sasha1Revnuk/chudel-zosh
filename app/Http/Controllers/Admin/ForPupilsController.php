<?php

namespace App\Http\Controllers\Admin;

use App\Models\ForStudent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ForPupilsController extends AdminController
{
    public function __construct()
    {
        parent::__construct();
        $this->src = 'for-pupils';
    }

    public function index()
    {
        return view('admin.layouts.documents.index')->with([
            'title' => 'Учням',
            'userName' => $this->userName,
            'documents' => ForStudent::orderBy('created_at', 'desc')->paginate(15),
            'src' => $this->src
        ]);

    }

    public function add()
    {
        $document = new ForStudent();
        return view('admin.layouts.documents.form')->with([
            'title' => 'Додати посилання',
            'userName' => $this->userName,
            'document' => $document,
            'src' => $this->src
        ]);
    }

    public function edit($id)
    {
        $document = ForStudent::find($id);
        return view('admin.layouts.documents.form')->with([
            'title' => 'Редагувати посилання',
            'userName' => $this->userName,
            'document' => $document,
            'src' => $this->src
        ]);
    }

    public function save(Request $request)
    {
        $this->saveDocument($request, $request->get('id') ? ForStudent::find($request->get('id')) : new ForStudent());
        if($request->get('id')) {
            return redirect()->back();
        } else {
            return redirect('/adm/' . $this->src);
        }
    }

    public function delete($id)
    {
        $src = ForStudent::find($id);
        $this->deleteDocument($src);
        return redirect()->back();
    }
}
