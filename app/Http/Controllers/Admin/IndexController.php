<?php

namespace App\Http\Controllers\Admin;

use App\Models\RoleUser;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class IndexController extends Controller
{

    public function __construct()
    {
        if (Auth::check()) {
            $this->user = Auth::user();
        } else {
            Redirect::to('/')->send();
        }
        $this->role = RoleUser::where('user_id', $this->user->id)->first();
    }

    public function index(Request $request)
    {
        $data = [
            'title' => 'Головна',
            'role' =>$this->role,
            'userName' => explode(' ', $this->user->full_name)
        ];
        switch($this->role->role_id) {
            case User::ROLE_ROOT :
                $data['users'] = User::query()
                    ->where('role_id', '<>', User::ROLE_ROOT)
                    ->orderBy('created_at', 'desc');
                if($request->get('email')) {
                    $data['users']->where('email', $request->get('email'));
                }

                if($request->get('role_id')) {
                    $data['users']->whereIn('role_id', $request->get('role_id'));
                }

                $data['users'] = $data['users']->get();
                break;
        };
        return view('admin.index.index')->with(['data' => $data]);
    }
}
