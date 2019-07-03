<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\FeedbackMail;

class ContactsController extends Controller
{
    public function index(Request $request)
    {
        $banner = Menu::where('src', '/' . $request->route()->uri)->first();
        $data = [
            'settings' => $this->getSettings(),
            'menu' => $this->getMenu(),
            'userName' =>$this->userName,
            'user' => $this->user,
            'role' => $this->role,
            'title' => 'Контакти',
            'banner' => $banner->banner != null ? $banner->banner : null,
        ];
        return view ('contacts')->with(['data' => $data]);
    }

    public function send(Request $request)
    {
        $text = $request->text;
        $name = $request->name;
        $email = $request->email;
        $toEmail = "revo0708@gmail.com";
        Mail::send('emails.feedback', ['name' => $name, 'text' => $text, 'email' => $email], function ($m) use ($toEmail) {
            $m->to($toEmail)->subject('Your Reminder!');
        });

        return redirect('/contacts');
    }
}
