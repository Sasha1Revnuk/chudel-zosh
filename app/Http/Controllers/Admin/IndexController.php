<?php

namespace App\Http\Controllers\Admin;

use App\Models\RoleUser;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class IndexController extends AdminController
{
    public function index(Request $request)
    {
        $users = null;
        switch($this->role->role_id) {
            case User::ROLE_ROOT :
                $users = User::query()
                    ->with('roles')
                    ->where('role_id', '<>', User::ROLE_ROOT)
                    ->orderBy('created_at', 'desc');
                if($request->get('email')) {
                    $users->where('email', $request->get('email'));
                }

                if($request->get('role_id')) {
                    $users->whereIn('role_id', $request->get('role_id'));
                }

                $users = $users->get();
                break;
        };

        return view('admin.index.index')->with([
            'title' => 'Головна',
            'role' =>$this->role,
            'userName' => $this->userName,
            'users' => $users
        ]);
    }

    public function changePassword(Request $request)
    {
        $user = User::find($this->user->id);
        $validator = Validator::make($request->all(), [
            'password' => 'required|min:6|confirmed',
        ]);

        if($validator->fails()) {
            return redirect()->route('main-admin')->withErrors($validator);
        }

        $user->password = bcrypt($request->get('password'));
        $user->update();
        Session::put('PasswordChange', 'Пароль успішно змінено');
        return redirect()->route('main-admin');
    }

    public function changeProfile(Request $request)
    {
        $user = User::find($this->user->id);
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'surname' => 'required',
        ]);

        if($validator->fails()) {
            return redirect()->route('main-admin')->withErrors($validator);
        }

        $user->full_name = $request->get('name') . ' ' . $request->get('surname');
        $user->update();
        Session::put('ProfileChange', 'Профіль успішно змінено!');
        return redirect()->route('main-admin');
    }

    public function setRole($id)
    {
        $this->checkRole(User::ROLE_ROOT);

        $user = User::find($id);
        $roleUser = RoleUser::where('user_id', $id)->first();
        if($user->role_id == User::ROLE_ADMIN) {
            $user->role_id = User::ROLE_USER;
            $roleUser->role_id = User::ROLE_USER;
        } else {
            $user->role_id = User::ROLE_ADMIN;
            $roleUser->role_id = User::ROLE_ADMIN;
        }
        $user->update();
        $roleUser->update();

        return redirect()->back();
    }

    public function userDelete($id)
    {
        $this->checkRole(User::ROLE_ROOT);

        $user = User::find($id);
        $roleUser = RoleUser::where('user_id', $id)->first();
        $roleUser->delete();
        $user->delete();

        return redirect()->back();
    }
}
