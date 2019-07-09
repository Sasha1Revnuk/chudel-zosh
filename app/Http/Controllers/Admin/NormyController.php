<?php

namespace App\Http\Controllers\Admin;

use App\Models\Normy;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NormyController extends AdminController
{
    public function __construct()
    {
        parent::__construct();
        $this->src = 'normy';
    }

    public function index()
    {
        return view('admin.layouts.documents.index')->with([
            'title' => 'Документи',
            'userName' => $this->userName,
            'documents' => Normy::orderBy('created_at', 'desc')->paginate(15),
            'src' => $this->src
        ]);

    }

    public function add()
    {
        $document = new Normy();
        return view('admin.layouts.documents.form')->with([
            'title' => 'Додати посилання',
            'userName' => $this->userName,
            'document' => $document,
            'src' => $this->src
        ]);
    }

    public function edit($id)
    {
        $document = Normy::find($id);
        return view('admin.layouts.documents.form')->with([
            'title' => 'Редагувати посилання',
            'userName' => $this->userName,
            'document' => $document,
            'src' => $this->src
        ]);
    }

    public function save(Request $request)
    {
        $this->saveDocument($request, $request->get('id') ? Normy::find($request->get('id')) : new Normy());
        if($request->get('id')) {
            return redirect()->back();
        } else {
            return redirect('/adm/' . $this->src);
        }
    }

    public function delete($id)
    {
        $src = Normy::find($id);
        $this->deleteDocument($src);
        return redirect()->back();
    }
}
