<?php

namespace App\Http\Controllers\Admin;

use App\Models\Advantage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class AdvantagesController extends AdminController
{
    public function index()
    {
        return view('admin.advantages.index')->with([
            'title' => 'Переваги',
            'userName' => $this->userName,
            'advantages' => Advantage::all()
        ]);
    }

    public function add()
    {
        $advantage = new Advantage();
        return view('admin.advantages.form')->with([
            'title' => 'Додати перевагу',
            'userName' => $this->userName,
            'advantage' => $advantage,
        ]);    }

    public function edit($id)
    {
        $advantage = Advantage::find($id);
        return view('admin.advantages.form')->with([
            'title' => 'Редагувати перевагу',
            'userName' => $this->userName,
            'advantage' => $advantage,
        ]);
    }

    public function save(Request $request)
    {
        if( !$request->get('id') )
        {
            $this->validate($request, [
                'name' => 'required',
                'text' => 'required',
            ]);
        }
        DB::transaction(function() use ($request) {
            $advantage = $request->get('id') ? Advantage::find($request->get('id')) : new Advantage();
            $advantage->name = $request->get('name');
            $advantage->text = $request->get('text');
            $advantage->save();
        });

        return redirect('/adm/advantages');
    }

    public function delete($id)
    {
        $advantage = Advantage::find($id);
        if($advantage) {
            $advantage->delete();
        }
        return redirect()->back();
    }
}
