<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\MetaBuilder;
use Illuminate\Http\Request;

/**
 * Class UserController
 * @package App\Http\Controllers
 */
class UserController extends Controller
{
    /**
     * @param $login
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(User $user)
    {
        app(MetaBuilder::class)
            ->title('Страница пользователя ' . $user->login)
            ->description('Страница пользователя ' . $user->login);

        return view('pages.user', compact('user'));
    }
}
