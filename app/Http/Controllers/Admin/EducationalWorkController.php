<?php

namespace App\Http\Controllers\Admin;

use App\Models\EducationWork;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EducationalWorkController extends AdminController
{
    public function __construct()
    {
        parent::__construct();
        $this->src = 'educational-work';
    }

    public function index()
    {
        return view('admin.layouts.documents.index')->with([
            'title' => 'Навчальна робота',
            'userName' => $this->userName,
            'documents' => EducationWork::orderBy('created_at', 'desc')->paginate(15),
            'src' => $this->src
        ]);

    }

    public function add()
    {
        $document = new EducationWork();
        return view('admin.layouts.documents.form')->with([
            'title' => 'Додати посилання',
            'userName' => $this->userName,
            'document' => $document,
            'src' => $this->src
        ]);
    }

    public function edit($id)
    {
        $document = EducationWork::find($id);
        return view('admin.layouts.documents.form')->with([
            'title' => 'Редагувати посилання',
            'userName' => $this->userName,
            'document' => $document,
            'src' => $this->src
        ]);
    }

    public function save(Request $request)
    {
        $this->saveDocument($request, $request->get('id') ? EducationWork::find($request->get('id')) : new EducationWork());
        if($request->get('id')) {
            return redirect()->back();
        } else {
            return redirect('/adm/' . $this->src);
        }
    }

    public function delete($id)
    {
        $src = EducationWork::find($id);
        $this->deleteDocument($src);
        return redirect()->back();
    }
}
