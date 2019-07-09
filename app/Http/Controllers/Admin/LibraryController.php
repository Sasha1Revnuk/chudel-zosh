<?php

namespace App\Http\Controllers\Admin;

use App\Models\Library;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LibraryController extends AdminController
{
    public function __construct()
    {
        parent::__construct();
        $this->src = 'library';
    }

    public function index()
    {
        return view('admin.layouts.documents.index')->with([
            'title' => 'Шкільна бібліотека',
            'userName' => $this->userName,
            'documents' => Library::orderBy('created_at', 'desc')->paginate(15),
            'src' => $this->src
        ]);

    }

    public function add()
    {
        $document = new Library();
        return view('admin.layouts.documents.form')->with([
            'title' => 'Додати посилання',
            'userName' => $this->userName,
            'document' => $document,
            'src' => $this->src
        ]);
    }

    public function edit($id)
    {
        $document = Library::find($id);
        return view('admin.layouts.documents.form')->with([
            'title' => 'Редагувати посилання',
            'userName' => $this->userName,
            'document' => $document,
            'src' => $this->src
        ]);
    }

    public function save(Request $request)
    {
        $this->saveDocument($request, $request->get('id') ? Library::find($request->get('id')) : new Library());
        if($request->get('id')) {
            return redirect()->back();
        } else {
            return redirect('/adm/' . $this->src);
        }
    }

    public function delete($id)
    {
        $src = Library::find($id);
        $this->deleteDocument($src);
        return redirect()->back();
    }
}
