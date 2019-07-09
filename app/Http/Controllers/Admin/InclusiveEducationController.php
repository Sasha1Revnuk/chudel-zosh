<?php

namespace App\Http\Controllers\Admin;

use App\Models\InclusiveWork;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class InclusiveEducationController extends AdminController
{
    public function index()
    {
        return view('admin.inclusive.index')->with([
            'title' => 'Інклюзивне навчання',
            'userName' => $this->userName,
            'inclusive' => InclusiveWork::first()
        ]);

    }

    public function save(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'text' => 'required',
        ]);
        $text = str_replace('https://drive.google.com/file/d/', 'https://docs.google.com/uc?id=', $request->get('text'));
        $text = str_replace('/view?usp=sharing', ' ', $text);
        DB::transaction(function() use ($request, $text) {
            $inclusive = InclusiveWork::find($request->get('id'));
            $inclusive->name = $request->get('name');
            $inclusive->text = $text;
            $inclusive->save();

        });

        return redirect()->back();
    }
}
