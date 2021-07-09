<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\MetaBuilder;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index($login)
    {
        $user = User::findByLogin($login);

        app(MetaBuilder::class)->title('Страница пользователя ' . $user->login);

        return view('pages.user', compact('user'));
    }
}
