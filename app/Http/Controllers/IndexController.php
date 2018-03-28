<?php

namespace App\Http\Controllers;
use App\User;

class IndexController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(\Auth::user()) {
            return redirect('tasks');
        }

        // Get random user
        $user = User::inRandomOrder()->first();

        return view('index', ['user' => $user]);
    }
}
