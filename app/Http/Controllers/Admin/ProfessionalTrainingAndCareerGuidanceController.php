<?php

namespace App\Http\Controllers\Admin;

use App\Models\ProfileLearn;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfessionalTrainingAndCareerGuidanceController extends AdminController
{
    public function __construct()
    {
        parent::__construct();
        $this->src = 'professional-training-and-career-guidance';
    }

    public function index()
    {
        return view('admin.layouts.documents.index')->with([
            'title' => 'Профільне навчання та профорієнтація',
            'userName' => $this->userName,
            'documents' => ProfileLearn::orderBy('created_at', 'desc')->paginate(15),
            'src' => $this->src
        ]);

    }

    public function add()
    {
        $document = new ProfileLearn();
        return view('admin.layouts.documents.form')->with([
            'title' => 'Додати посилання',
            'userName' => $this->userName,
            'document' => $document,
            'src' => $this->src
        ]);
    }

    public function edit($id)
    {
        $document = ProfileLearn::find($id);
        return view('admin.layouts.documents.form')->with([
            'title' => 'Редагувати посилання',
            'userName' => $this->userName,
            'document' => $document,
            'src' => $this->src
        ]);
    }

    public function save(Request $request)
    {
        $this->saveDocument($request, $request->get('id') ? ProfileLearn::find($request->get('id')) : new ProfileLearn());
        if($request->get('id')) {
            return redirect()->back();
        } else {
            return redirect('/adm/' . $this->src);
        }
    }

    public function delete($id)
    {
        $src = ProfileLearn::find($id);
        $this->deleteDocument($src);
        return redirect()->back();
    }
}
