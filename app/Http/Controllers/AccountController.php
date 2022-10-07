<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use function back;
use function view;

class AccountController extends Controller
{
    public function index(User $user)
    {
        return view('account.index', ['user' => $user]);
    }

    public function settings(User $user)
    {
        return view('account.settings', ['user' => $user]);
    }

    public function update(User $user)
    {

    }
}
