<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Menu;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AnnouncementController extends Controller
{
    public function index(Request $request, $year=null)
    {
        $announcements = Announcement::query()
            ->where('status', Announcement::STATUS_ACTIVE);

        if ($year) {
            $announcements->where('created_at', 'LIKE', '%' . $year . '%');
        }

        if ($request->get('name')) {
            $announcements->where('name', 'LIKE', '%' . $request->get('name') . '%');
        }

        $announcements = $announcements->orderBy('created_at', 'desc')->paginate(Setting::where('name', 'annoncOnPage')->first()->value);
        $banner = Menu::where('src', 'LIKE', '/announcements' . '%')->first();
        $data = [
            'settings' => $this->getSettings(),
            'menu' => $this->getMenu(),
            'userName' =>$this->userName,
            'user' => $this->user,
            'role' => $this->role,
            'title' => 'Оголошення',
            'banner' => $banner->banner != null ? $banner->banner : null,
            'announcement' => $announcements,
        ];
        return view ('announcement')->with(['data' => $data]);
    }

    public function view($url)
    {
        $announcement = Announcement::with('user')->where('url', $url)->where('status', Announcement::STATUS_ACTIVE)->first();
        if (!$announcement) {
            return redirect('/announcements');
        }
        $data = [
            'settings' => $this->getSettings(),
            'menu' => $this->getMenu(),
            'userName' =>$this->userName,
            'user' => $this->user,
            'role' => $this->role,
            'title' => $announcement->name,
            'announcement' => $announcement,
            'lastAnnouncement' => Announcement::with('user')->where('status', Announcement::STATUS_ACTIVE)->orderBy('created_at', 'desc')->limit(Setting::where('name', 'lastAnnoncesOnView')->first()->value)->get(),
            'archive' => Announcement::query()
                ->select(DB::raw('count(id) as `data`'), DB::raw('YEAR(created_at) year'))
                ->groupby('year')
                ->orderBy('year', 'desc')
                ->get()
        ];
        return view ('announcement.view')->with(['data' => $data]);
    }
}
