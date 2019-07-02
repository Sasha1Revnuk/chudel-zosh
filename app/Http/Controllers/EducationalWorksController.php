<?php

namespace App\Http\Controllers;

use App\Models\EducationalWork;
use App\Models\Menu;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EducationalWorksController extends Controller
{
    public function index(Request $request, $year=null)
    {
        $educationalWorks = EducationalWork::query();

        if ($year) {
            $educationalWorks->where('created_at', 'LIKE', '%' . $year . '%');
        }

        if ($request->get('name')) {
            $educationalWorks->where('name', 'LIKE', '%' . $request->get('name') . '%');
        }

        $educationalWorks = $educationalWorks->orderBy('created_at', 'desc')->paginate(Setting::where('name', 'educationalWorkOnPage')->first()->value);
        $banner = Menu::where('src', 'LIKE', '/methodical-works' . '%')->first();
        $data = [
            'settings' => $this->getSettings(),
            'menu' => $this->getMenu(),
            'userName' =>$this->userName,
            'user' => $this->user,
            'role' => $this->role,
            'title' => 'Виховна робота',
            'banner' => $banner->banner != null ? $banner->banner : null,
            'educationalWorks' => $educationalWorks,
        ];
        return view ('educationalWorks')->with(['data' => $data]);
    }

    public function view($url)
    {
        $educationalWork = EducationalWork::where('url', $url)->first();
        if (!$educationalWork) {
            return redirect('/educational-works');
        }
        $data = [
            'settings' => $this->getSettings(),
            'menu' => $this->getMenu(),
            'userName' =>$this->userName,
            'user' => $this->user,
            'role' => $this->role,
            'title' => $educationalWork->name,
            'educationalWork' => $educationalWork,
            'lastEducationalWork' => EducationalWork::orderBy('created_at', 'desc')->limit(Setting::where('name', 'lastEducationalWork')->first()->value)->get(),
            'archive' => EducationalWork::query()
                ->select(DB::raw('count(id) as `data`'), DB::raw('YEAR(created_at) year'))
                ->groupby('year')
                ->orderBy('year', 'desc')
                ->get()
        ];
        return view ('educationalWork.view')->with(['data' => $data]);
    }
}
