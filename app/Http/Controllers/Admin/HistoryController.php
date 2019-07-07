<?php

namespace App\Http\Controllers\Admin;

use App\Models\History;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class HistoryController extends AdminController
{
    public function index()
    {
        return view('admin.history.index')->with([
            'title' => 'Історія школи',
            'userName' => $this->userName,
            'history' => History::first()
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
            $history = History::find($request->get('id'));
            $history->name = $request->get('name');
            $history->text = $text;
            $history->save();

        });

        return redirect()->back();
    }
}
