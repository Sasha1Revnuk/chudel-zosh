<?php

namespace App\Http\Controllers\Admin;

use App\Models\PsychologicWork;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PsychologicalServiceController extends AdminController
{
    public function __construct()
    {
        parent::__construct();
        $this->src = 'psychological-service';
    }

    public function index()
    {
        return view('admin.layouts.documents.index')->with([
            'title' => 'Психологічна служба',
            'userName' => $this->userName,
            'documents' => PsychologicWork::orderBy('created_at', 'desc')->paginate(15),
            'src' => $this->src
        ]);

    }

    public function add()
    {
        $document = new PsychologicWork();
        return view('admin.layouts.documents.form')->with([
            'title' => 'Додати посилання',
            'userName' => $this->userName,
            'document' => $document,
            'src' => $this->src
        ]);
    }

    public function edit($id)
    {
        $document = PsychologicWork::find($id);
        return view('admin.layouts.documents.form')->with([
            'title' => 'Редагувати посилання',
            'userName' => $this->userName,
            'document' => $document,
            'src' => $this->src
        ]);
    }

    public function save(Request $request)
    {
        $this->saveDocument($request, $request->get('id') ? PsychologicWork::find($request->get('id')) : new PsychologicWork());
        if($request->get('id')) {
            return redirect()->back();
        } else {
            return redirect('/adm/' . $this->src);
        }
    }

    public function delete($id)
    {
        $src = PsychologicWork::find($id);
        $this->deleteDocument($src);
        return redirect()->back();
    }
}
