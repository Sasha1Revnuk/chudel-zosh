<?php

namespace App\Http\Controllers\Admin;

use App\Models\ForParent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ForParantsController extends AdminController
{
    public function __construct()
    {
        parent::__construct();
        $this->src = 'for-parents';
    }

    public function index()
    {
        return view('admin.layouts.documents.index')->with([
            'title' => 'Батькам',
            'userName' => $this->userName,
            'documents' => ForParent::orderBy('created_at', 'desc')->paginate(15),
            'src' => $this->src
        ]);

    }

    public function add()
    {
        $document = new ForParent();
        return view('admin.layouts.documents.form')->with([
            'title' => 'Додати посилання',
            'userName' => $this->userName,
            'document' => $document,
            'src' => $this->src
        ]);
    }

    public function edit($id)
    {
        $document = ForParent::find($id);
        return view('admin.layouts.documents.form')->with([
            'title' => 'Редагувати посилання',
            'userName' => $this->userName,
            'document' => $document,
            'src' => $this->src
        ]);
    }

    public function save(Request $request)
    {
        $this->saveDocument($request, $request->get('id') ? ForParent::find($request->get('id')) : new ForParent());
        if($request->get('id')) {
            return redirect()->back();
        } else {
            return redirect('/adm/' . $this->src);
        }
    }

    public function delete($id)
    {
        $src = ForParent::find($id);
        $this->deleteDocument($src);
        return redirect()->back();
    }
}
