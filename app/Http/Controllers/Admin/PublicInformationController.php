<?php

namespace App\Http\Controllers\Admin;

use App\Models\PublicInformations;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PublicInformationController extends AdminController
{
    public function __construct()
    {
        parent::__construct();
        $this->src = 'public-information';
    }

    public function index()
    {
        return view('admin.layouts.documents.index')->with([
            'title' => 'Публічна інформація',
            'userName' => $this->userName,
            'documents' => PublicInformations::orderBy('created_at', 'desc')->paginate(15),
            'src' => $this->src
        ]);

    }

    public function add()
    {
        $document = new PublicInformations();
        return view('admin.layouts.documents.form')->with([
            'title' => 'Додати посилання',
            'userName' => $this->userName,
            'document' => $document,
            'src' => $this->src
        ]);
    }

    public function edit($id)
    {
        $document = PublicInformations::find($id);
        return view('admin.layouts.documents.form')->with([
            'title' => 'Редагувати посилання',
            'userName' => $this->userName,
            'document' => $document,
            'src' => $this->src
        ]);
    }

    public function save(Request $request)
    {
        $this->saveDocument($request, $request->get('id') ? PublicInformations::find($request->get('id')) : new PublicInformations());
        if($request->get('id')) {
            return redirect()->back();
        } else {
            return redirect('/adm/' . $this->src);
        }
    }

    public function delete($id)
    {
        $src = PublicInformations::find($id);
        $this->deleteDocument($src);
        return redirect()->back();
    }
}
