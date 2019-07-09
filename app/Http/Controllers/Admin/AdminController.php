<?php

namespace App\Http\Controllers\Admin;

use App\Models\RoleUser;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Intervention\Image\ImageManagerStatic as Image;


class AdminController extends Controller
{
    protected $user;
    protected $role;
    protected $userName;
    protected $src;

    public function __construct()
    {
        if (Auth::check()) {
            $this->user = Auth::user();
            $this->role = RoleUser::where('user_id', $this->user->id)->first();
            if ($this->role->role_id == User::ROLE_USER) {
                Redirect::to('/')->send();
            }
            $this->userName = explode(' ', $this->user->full_name);
        } else {
            Redirect::to('/')->send();
        }
    }

    public function checkRole($id)
    {
        if ($this->role->role_id != $id) {
            Redirect::to('/')->send();
        }
    }

    public function resizeFile($filePath, $width)
    {
        $image = Image::make($filePath);
        $image->interlace(true);
        $image->save();

        $image->resize($width, null, function ($constraint) {
            $constraint->aspectRatio();
        });
        $image->interlace(true);

        $ext = pathinfo($filePath, PATHINFO_EXTENSION);
        $image->save($filePath.'_'.'thumbnail'. '.' .$ext);
    }

    protected function saveDocument($request, $document)
    {
        $this->validate($request, [
            'name' => 'required',
            'src' => 'required',
        ]);
        $document->name = $request->get('name');
        $document->src = $request->get('src');
        return $document->save();
    }

    protected function deleteDocument($src)
    {
        if($src) {
            return $src->delete();
        }
    }
}
