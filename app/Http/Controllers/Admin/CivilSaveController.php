<?php

namespace App\Http\Controllers\Admin;

use App\Models\CivilSafe;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CivilSaveController extends AdminController
{
    public function __construct()
    {
        parent::__construct();
        $this->src = 'civil-save';
    }

    public function index()
    {
        return view('admin.layouts.documents.index')->with([
            'title' => 'Цивільний захист',
            'userName' => $this->userName,
            'documents' => CivilSafe::orderBy('created_at', 'desc')->paginate(15),
            'src' => $this->src
        ]);

    }

    public function add()
    {
        $document = new CivilSafe();
        return view('admin.layouts.documents.form')->with([
            'title' => 'Додати посилання',
            'userName' => $this->userName,
            'document' => $document,
            'src' => $this->src
        ]);
    }

    public function edit($id)
    {
        $document = CivilSafe::find($id);
        return view('admin.layouts.documents.form')->with([
            'title' => 'Редагувати посилання',
            'userName' => $this->userName,
            'document' => $document,
            'src' => $this->src
        ]);
    }

    public function save(Request $request)
    {
        $this->saveDocument($request, $request->get('id') ? CivilSafe::find($request->get('id')) : new CivilSafe());
        if($request->get('id')) {
            return redirect()->back();
        } else {
            return redirect('/adm/' . $this->src);
        }
    }

    public function delete($id)
    {
        $src = CivilSafe::find($id);
        $this->deleteDocument($src);
        return redirect()->back();
    }
}
