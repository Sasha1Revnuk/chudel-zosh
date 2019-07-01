<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\MethodicalWork;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MethodicalWorksController extends Controller
{
    public function index(Request $request, $year=null)
    {
        $methodicalWorks = MethodicalWork::query();

        if ($year) {
            $methodicalWorks->where('created_at', 'LIKE', '%' . $year . '%');
        }

        if ($request->get('name')) {
            $methodicalWorks->where('name', 'LIKE', '%' . $request->get('name') . '%');
        }

        $methodicalWorks = $methodicalWorks->orderBy('created_at', 'desc')->paginate(Setting::where('name', 'methodicalWorkOnPage')->first()->value);
        $banner = Menu::where('src', 'LIKE', '/methodical-works' . '%')->first();
        $data = [
            'settings' => $this->getSettings(),
            'menu' => $this->getMenu(),
            'userName' =>$this->userName,
            'user' => $this->user,
            'role' => $this->role,
            'title' => 'Методична робота',
            'banner' => $banner->banner != null ? $banner->banner : null,
            'methodicalWorks' => $methodicalWorks,
        ];
        return view ('methodicalWorks')->with(['data' => $data]);
    }

    public function view($url)
    {
        $methodicalWork = MethodicalWork::where('url', $url)->first();
        $data = [
            'settings' => $this->getSettings(),
            'menu' => $this->getMenu(),
            'userName' =>$this->userName,
            'user' => $this->user,
            'role' => $this->role,
            'title' => $methodicalWork->name,
            'methodicalWork' => $methodicalWork,
            'lastMethodicalWork' => MethodicalWork::orderBy('created_at', 'desc')->limit(Setting::where('name', 'lastMethodicalWork')->first()->value)->get(),
            'archive' => MethodicalWork::query()
                ->select(DB::raw('count(id) as `data`'), DB::raw('YEAR(created_at) year'))
                ->groupby('year')
                ->orderBy('year', 'desc')
                ->get()
        ];
        return view ('methodicalWork.view')->with(['data' => $data]);
    }
}
