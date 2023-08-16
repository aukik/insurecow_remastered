<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
    public function index()
    {

        if (auth()->user()->role == 'f') {
            return redirect()->route("farmer_profile.index");
        } elseif (auth()->user()->role == 's') {
            return redirect()->route("profile.index");
        } elseif (auth()->user()->role == 'c') {
            return redirect()->route('farmer_register.index');
        } else {
            abort(404);
        }
    }
}
