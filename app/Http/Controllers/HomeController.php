<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() : view
    {
        $users = User::simplePaginate(10);
        return view('home', compact('users'));
    }

    public function searchUser(Request $request)
    {
        $users = User::query()
            ->when($request->id, fn($q) => $q->where('id', 'LIKE', $request->id.'%'))
            ->when($request->name, fn($q) => $q->where('name', 'LIKE', $request->name.'%'))
            ->when($request->email, fn($q) => $q->where('email', 'LIKE', $request->email.'%'))
            ->get();

        return view('home', compact('users'));
    }
}
