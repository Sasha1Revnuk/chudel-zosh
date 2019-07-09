<?php

namespace App\Http\Controllers\Admin;

use App\Models\MethodicalWork;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MethodicalWorkController extends AdminController
{
    public function __construct()
    {
        parent::__construct();
        $this->src = 'methodical-work';
    }

    public function index()
    {
        return view('admin.layouts.documents.index')->with([
            'title' => 'Методична робота',
            'userName' => $this->userName,
            'documents' => MethodicalWork::orderBy('created_at', 'desc')->paginate(15),
            'src' => $this->src
        ]);

    }

    public function add()
    {
        $document = new MethodicalWork();
        return view('admin.layouts.documents.form')->with([
            'title' => 'Додати посилання',
            'userName' => $this->userName,
            'document' => $document,
            'src' => $this->src
        ]);
    }

    public function edit($id)
    {
        $document = MethodicalWork::find($id);
        return view('admin.layouts.documents.form')->with([
            'title' => 'Редагувати посилання',
            'userName' => $this->userName,
            'document' => $document,
            'src' => $this->src
        ]);
    }

    public function save(Request $request)
    {
        $this->saveDocument($request, $request->get('id') ? MethodicalWork::find($request->get('id')) : new MethodicalWork());
        if($request->get('id')) {
            return redirect()->back();
        } else {
            return redirect('/adm/' . $this->src);
        }
    }

    public function delete($id)
    {
        $src = MethodicalWork::find($id);
        $this->deleteDocument($src);
        return redirect()->back();
    }
}
