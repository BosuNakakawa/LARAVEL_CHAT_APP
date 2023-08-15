<?php

namespace App\Http\Controllers;

use App\Models\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    public function index()
    {
        if ($_COOKIE['guest_token'] == null) {
            $cookie = Str::random(10);

            $model = new Session();
            $model->key = $cookie;
            $model->save();

            setcookie('guest_token', $cookie);

            return view('pages.home');
        }

        return view('pages.home');
    }
}
