<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\News;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $news = News::query()
        ->where('status', News::STATUS_ACTIVE);

        if ($request->get('year') && $request->get('month')) {
          $news->where('created_at', 'LIKE', '%' . $request->get('year') . '-' . $request->get('month') . '%');
        } else if ($request->get('year')) {
          $news->where('created_at', 'LIKE', '%' . $request->get('year') . '%');
        }

        if ($request->get('name')) {
            $news->where('name', 'LIKE', '%' . $request->get('name') . '%');
        }

        $news = $news->orderBy('created_at', 'desc')->paginate(Setting::where('name', 'newsOnPage')->first()->value);
        $archive = [];
        $list = News::where('status', News::STATUS_ACTIVE)->get();
        foreach ($list as $item) {
            $archive[$item->created_at->format('Y')][$item->created_at->format('m')][] = $item;
        }
        $data = [
            'settings' => $this->getSettings(),
            'userName' =>$this->userName,
            'user' => $this->user,
            'role' => $this->role,
            'title' => 'Новини',
            'news' => $news,
            'archive' => $archive
        ];
        return view ('news')->with(['data' => $data]);
    }

    public function view($url)
    {
        $news =News::with('user')->where('url', $url)->where('status', News::STATUS_ACTIVE)->first();
        if (!$news) {
            return redirect('/news');
        }
        $archive = [];
        $list = News::where('status', News::STATUS_ACTIVE)->get();
        foreach ($list as $item) {
            $archive[$item->created_at->format('Y')][$item->created_at->format('m')][] = $item;
        }
        $data = [
            'settings' => $this->getSettings(),
            'userName' =>$this->userName,
            'user' => $this->user,
            'role' => $this->role,
            'title' => $news->name,
            'news' => $news,
            'lastNews' => News::with('user')->where('status', News::STATUS_ACTIVE)->orderBy('created_at', 'desc')->limit(Setting::where('name', 'lastNewsOnView')->first()->value)->get(),
            'archive' => $archive
       ];


        return view ('news.view')->with(['data' => $data]);
    }

}
