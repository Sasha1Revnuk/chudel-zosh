<?php

namespace App\Http\Controllers\Admin;

use App\Models\VihovWork;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EducationalActivitiesController extends AdminController
{
    public function __construct()
    {
        parent::__construct();
        $this->src = 'educational-activities';
    }

    public function index()
    {
        return view('admin.layouts.documents.index')->with([
            'title' => 'Виховна робота',
            'userName' => $this->userName,
            'documents' => VihovWork::orderBy('created_at', 'desc')->paginate(15),
            'src' => $this->src
        ]);

    }

    public function add()
    {
        $document = new VihovWork();
        return view('admin.layouts.documents.form')->with([
            'title' => 'Додати посилання',
            'userName' => $this->userName,
            'document' => $document,
            'src' => $this->src
        ]);
    }

    public function edit($id)
    {
        $document = VihovWork::find($id);
        return view('admin.layouts.documents.form')->with([
            'title' => 'Редагувати посилання',
            'userName' => $this->userName,
            'document' => $document,
            'src' => $this->src
        ]);
    }

    public function save(Request $request)
    {
        $this->saveDocument($request, $request->get('id') ? VihovWork::find($request->get('id')) : new VihovWork());
        if($request->get('id')) {
            return redirect()->back();
        } else {
            return redirect('/adm/' . $this->src);
        }
    }

    public function delete($id)
    {
        $src = VihovWork::find($id);
        $this->deleteDocument($src);
        return redirect()->back();
    }
}
