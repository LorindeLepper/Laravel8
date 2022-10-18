<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SettingsController extends Controller
{
    public function index()
    {
        return view('settings.index');
    }

    public function update()
    {
        $user = Auth::user();

        $user->username = Request::input('username');
        $user->name = Request::input('name');
        $user->email = Request::input('email');

        if (!Request::input('password') == '') {
            $user->password = bcrypt(Request::input('password'));
        }

        $user->save();

        return back()->with('success', 'Account updated!');
    }

}
