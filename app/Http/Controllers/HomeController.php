<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = DB::table('posts')->paginate(6);
        return view('index', compact('posts'));
    }

    public function getPosts()
    {
        return view('users.post_detail');
    }

    public function getMap()
    {
        return view('vendors.map.mapTest');
    }
}
