<?php

namespace App\Http\Controllers\Admin;

use App\Models\InclusiveWork;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class InclusiveEducationController extends AdminController
{
    public function __construct()
    {
        parent::__construct();
        $this->src = 'inclusive-education';
    }

    public function index()
    {
        return view('admin.layouts.documents.index')->with([
            'title' => 'Інклюзивне навчання',
            'userName' => $this->userName,
            'documents' => InclusiveWork::orderBy('created_at', 'desc')->paginate(15),
            'src' => $this->src
        ]);

    }

    public function add()
    {
        $document = new InclusiveWork();
        return view('admin.layouts.documents.form')->with([
            'title' => 'Додати посилання',
            'userName' => $this->userName,
            'document' => $document,
            'src' => $this->src
        ]);
    }

    public function edit($id)
    {
        $document = InclusiveWork::find($id);
        return view('admin.layouts.documents.form')->with([
            'title' => 'Редагувати посилання',
            'userName' => $this->userName,
            'document' => $document,
            'src' => $this->src
        ]);
    }

    public function save(Request $request)
    {
        $this->saveDocument($request, $request->get('id') ? InclusiveWork::find($request->get('id')) : new InclusiveWork());
        if($request->get('id')) {
            return redirect()->back();
        } else {
            return redirect('/adm/' . $this->src);
        }
    }

    public function delete($id)
    {
        $src = InclusiveWork::find($id);
        $this->deleteDocument($src);
        return redirect()->back();
    }
}
