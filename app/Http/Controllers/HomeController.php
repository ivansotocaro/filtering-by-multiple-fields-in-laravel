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

        $query = User::query();

        if($request->id) {
            $query->where('id', 'LIKE', $request->id.'%');
        }
        if($request->name) {
            $query->where('name', 'LIKE', $request->name.'%');
        }
        if($request->email) {
            $query->where('email', 'LIKE', $request->email.'%');
        }
        $users = $query->get();
        return view('home', compact('users'));

    }
}
