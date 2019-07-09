<?php

namespace App\Http\Controllers\Admin;

use App\Models\Zno;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ZnoDpaController extends AdminController
{
    public function __construct()
    {
        parent::__construct();
        $this->src = 'zno-dpa';
    }

    public function index()
    {
        return view('admin.layouts.documents.index')->with([
            'title' => 'ДПА і ЗНО',
            'userName' => $this->userName,
            'documents' => Zno::orderBy('created_at', 'desc')->paginate(15),
            'src' => $this->src
        ]);

    }

    public function add()
    {
        $document = new Zno();
        return view('admin.layouts.documents.form')->with([
            'title' => 'Додати посилання',
            'userName' => $this->userName,
            'document' => $document,
            'src' => $this->src
        ]);
    }

    public function edit($id)
    {
        $document = Zno::find($id);
        return view('admin.layouts.documents.form')->with([
            'title' => 'Редагувати посилання',
            'userName' => $this->userName,
            'document' => $document,
            'src' => $this->src
        ]);
    }

    public function save(Request $request)
    {
        $this->saveDocument($request, $request->get('id') ? Zno::find($request->get('id')) : new Zno());
        if($request->get('id')) {
            return redirect()->back();
        } else {
            return redirect('/adm/' . $this->src);
        }
    }

    public function delete($id)
    {
        $src = Zno::find($id);
        $this->deleteDocument($src);
        return redirect()->back();
    }
}
