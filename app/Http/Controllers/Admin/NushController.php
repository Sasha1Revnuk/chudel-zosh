<?php

namespace App\Http\Controllers\Admin;

use App\Models\Nush;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NushController extends AdminController
{
    public function __construct()
    {
        parent::__construct();
        $this->src = 'nush';
    }

    public function index()
    {
        return view('admin.layouts.documents.index')->with([
            'title' => 'НУШ',
            'userName' => $this->userName,
            'documents' => Nush::orderBy('created_at', 'desc')->paginate(15),
            'src' => $this->src
        ]);

    }

    public function add()
    {
        $document = new Nush();
        return view('admin.layouts.documents.form')->with([
            'title' => 'Додати посилання',
            'userName' => $this->userName,
            'document' => $document,
            'src' => $this->src
        ]);
    }

    public function edit($id)
    {
        $document = Nush::find($id);
        return view('admin.layouts.documents.form')->with([
            'title' => 'Редагувати посилання',
            'userName' => $this->userName,
            'document' => $document,
            'src' => $this->src
        ]);
    }

    public function save(Request $request)
    {
        $this->saveDocument($request, $request->get('id') ? Nush::find($request->get('id')) : new Nush());
        if($request->get('id')) {
            return redirect()->back();
        } else {
            return redirect('/adm/' . $this->src);
        }
    }

    public function delete($id)
    {
        $src = Nush::find($id);
        $this->deleteDocument($src);
        return redirect()->back();
    }
}
