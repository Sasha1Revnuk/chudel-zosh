<?php

namespace App\Http\Controllers;

use App\Models\Dpa;
use App\Models\Menu;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DpaController extends Controller
{
    public function index(Request $request, $year=null)
    {
        $dpas = Dpa::query()
            ->where('status', Dpa::STATUS_ACTIVE);

        if ($year) {
            $dpas->where('created_at', 'LIKE', '%' . $year . '%');
        }

        if ($request->get('name')) {
            $dpas->where('name', 'LIKE', '%' . $request->get('name') . '%');
        }

        $dpas = $dpas->orderBy('created_at', 'desc')->paginate(Setting::where('name', 'dpasOnPage')->first()->value);
        $banner = Menu::where('src', 'LIKE', '/zno' . '%')->first();
        $data = [
            'settings' => $this->getSettings(),
            'menu' => $this->getMenu(),
            'userName' =>$this->userName,
            'user' => $this->user,
            'role' => $this->role,
            'title' => 'ДПА',
            'banner' => $banner->banner != null ? $banner->banner : null,
            'dpas' => $dpas,
        ];
        return view ('dpa')->with(['data' => $data]);
    }

    public function view($url)
    {
        $dpa = Dpa::where('url', $url)->first();
        if (!$dpa) {
            return redirect('/dpa');
        }
        $data = [
            'settings' => $this->getSettings(),
            'menu' => $this->getMenu(),
            'userName' =>$this->userName,
            'user' => $this->user,
            'role' => $this->role,
            'title' => $dpa->name,
            'dpa' => $dpa,
            'lastDpas' => Dpa::orderBy('created_at', 'desc')->where('status', Dpa::STATUS_ACTIVE)->limit(Setting::where('name', 'dpasOnPage')->first()->value)->get(),
            'archive' => Dpa::query()
                ->select(DB::raw('count(id) as `data`'), DB::raw('YEAR(created_at) year'))
                ->groupby('year')
                ->orderBy('year', 'desc')
                ->get()
        ];
        return view ('dpa.view')->with(['data' => $data]);
    }
}
