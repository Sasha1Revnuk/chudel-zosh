<?php

namespace App\Http\Controllers\Admin;

use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class SettingsController extends AdminController
{
    public function index()
    {
        return view('admin.settings.index')->with([
            'title' => 'Налаштування',
            'userName' => $this->userName,
            'settings' => Setting::all()
        ]);

    }

    public function save(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'mainPage_news' => 'required|numeric|min:1|max:100',
            'newsOnPage' => 'required|numeric|min:1|max:100',
            'lastNewsOnView' => 'required|numeric|min:1|max:100',
        ]);


        DB::transaction(function() use ($request) {
            $email = Setting::where('name', 'email')->first();
            $email->value = $request->get('email');
            $email->save();

            $address = Setting::where('name', 'address')->first();
            $address->value = $request->get('address');
            $address->save();

            $phone = Setting::where('name', 'phone')->first();
            $phone->value = $request->get('phone');
            $phone->save();

            $mainPage_news = Setting::where('name', 'mainPage_news')->first();
            $mainPage_news->value = $request->get('mainPage_news');
            $mainPage_news->save();

            $newsOnPage = Setting::where('name', 'newsOnPage')->first();
            $newsOnPage->value = $request->get('newsOnPage');
            $newsOnPage->save();

            $lastNewsOnView = Setting::where('name', 'lastNewsOnView')->first();
            $lastNewsOnView->value = $request->get('lastNewsOnView');
            $lastNewsOnView->save();

        });

        return redirect()->back();
    }
}
