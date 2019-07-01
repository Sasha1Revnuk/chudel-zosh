<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\News;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    public function index(Request $request, $year=null)
    {
        $news = News::query()
        ->where('status', News::STATUS_ACTIVE);

        if ($year) {
          $news->where('created_at', 'LIKE', '%' . $year . '%');
        }

        if ($request->get('name')) {
            $news->where('name', 'LIKE', '%' . $request->get('name') . '%');
        }

        $news = $news->orderBy('created_at', 'desc')->paginate(Setting::where('name', 'newsOnPage')->first()->value);
        $banner = Menu::where('src', 'LIKE', '/news' . '%')->first();
        $data = [
            'settings' => $this->getSettings(),
            'menu' => $this->getMenu(),
            'userName' =>$this->userName,
            'user' => $this->user,
            'role' => $this->role,
            'title' => 'Новини',
            'banner' => $banner->banner != null ? $banner->banner : null,
            'news' => $news,
        ];
        return view ('news')->with(['data' => $data]);
    }

    public function view($url)
    {
        $news =News::with('user')->where('url', $url)->where('status', News::STATUS_ACTIVE)->first();
        $data = [
            'settings' => $this->getSettings(),
            'menu' => $this->getMenu(),
            'userName' =>$this->userName,
            'user' => $this->user,
            'role' => $this->role,
            'title' => $news->name,
            'news' => $news,
            'lastNews' => News::with('user')->where('status', News::STATUS_ACTIVE)->orderBy('created_at', 'desc')->limit(Setting::where('name', 'lastNewsOnView')->first()->value)->get(),
            'archive' => News::query()
                ->select(DB::raw('count(id) as `data`'), DB::raw('YEAR(created_at) year'))
                ->groupby('year')
                ->orderBy('year', 'desc')
                ->get()
        ];
        return view ('news.view')->with(['data' => $data]);
    }

}
