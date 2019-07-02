<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Setting;
use App\Models\Zno;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ZnoController extends Controller
{
    public function index(Request $request, $year=null)
    {
        $znos = Zno::query()
            ->where('status', Zno::STATUS_ACTIVE);

        if ($year) {
            $znos->where('created_at', 'LIKE', '%' . $year . '%');
        }

        if ($request->get('name')) {
            $znos->where('name', 'LIKE', '%' . $request->get('name') . '%');
        }

        $znos = $znos->orderBy('created_at', 'desc')->paginate(Setting::where('name', 'znosOnPage')->first()->value);
        $banner = Menu::where('src', 'LIKE', '/zno' . '%')->first();
        $data = [
            'settings' => $this->getSettings(),
            'menu' => $this->getMenu(),
            'userName' =>$this->userName,
            'user' => $this->user,
            'role' => $this->role,
            'title' => 'ЗНО',
            'banner' => $banner->banner != null ? $banner->banner : null,
            'znos' => $znos,
        ];
        return view ('zno')->with(['data' => $data]);
    }

    public function view($url)
    {
        $zno = Zno::where('url', $url)->first();
        if (!$zno) {
            return redirect('/zno');
        }
        $data = [
            'settings' => $this->getSettings(),
            'menu' => $this->getMenu(),
            'userName' =>$this->userName,
            'user' => $this->user,
            'role' => $this->role,
            'title' => $zno->name,
            'zno' => $zno,
            'lastZno' => Zno::orderBy('created_at', 'desc')->where('status', Zno::STATUS_ACTIVE)->limit(Setting::where('name', 'lastZnosWork')->first()->value)->get(),
            'archive' => Zno::query()
                ->select(DB::raw('count(id) as `data`'), DB::raw('YEAR(created_at) year'))
                ->groupby('year')
                ->orderBy('year', 'desc')
                ->get()
        ];
        return view ('zno.view')->with(['data' => $data]);
    }
}
