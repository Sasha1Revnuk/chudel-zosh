<?php

namespace App\Http\Controllers\Admin;

use App\Models\Atestation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AtestationController extends AdminController
{
    public function __construct()
    {
        parent::__construct();
        $this->src = 'atestation';
    }

    public function index()
    {
        return view('admin.layouts.documents.index')->with([
            'title' => 'Атестація',
            'userName' => $this->userName,
            'documents' => Atestation::orderBy('created_at', 'desc')->paginate(15),
            'src' => $this->src
        ]);

    }

    public function add()
    {
        $document = new Atestation();
        return view('admin.layouts.documents.form')->with([
            'title' => 'Додати посилання',
            'userName' => $this->userName,
            'document' => $document,
            'src' => $this->src
        ]);
    }

    public function edit($id)
    {
        $document = Atestation::find($id);
        return view('admin.layouts.documents.form')->with([
            'title' => 'Редагувати посилання',
            'userName' => $this->userName,
            'document' => $document,
            'src' => $this->src
        ]);
    }

    public function save(Request $request)
    {
        $this->saveDocument($request, $request->get('id') ? Atestation::find($request->get('id')) : new Atestation());
        if($request->get('id')) {
            return redirect()->back();
        } else {
            return redirect('/adm/' . $this->src);
        }
    }

    public function delete($id)
    {
        $src = Atestation::find($id);
        $this->deleteDocument($src);
        return redirect()->back();
    }
}
