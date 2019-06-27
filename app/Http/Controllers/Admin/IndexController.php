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
        parent::__construct();
        if ($this->user == null || $this->role->role_id != User::ROLE_ROOT) {
            Redirect::to('/')->send();
        }

    }

    public function index(Request $request)
    {
        $data = [
            'title' => 'Головна',
            'role' =>$this->role,
            'userName' => $this->userName
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
