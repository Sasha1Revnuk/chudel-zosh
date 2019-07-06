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
        DB::transaction(function() use ($request) {
            $history = History::find($request->get('id'));
            $history->name = $request->get('name');
            $history->text = $request->get('text');
            $history->save();

        });

        return redirect('/adm/symbolism');
    }
}
