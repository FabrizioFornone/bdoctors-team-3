<?php

namespace App\Http\Controllers;

use App\Message;
use App\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $messages = Message::where('user_id', Auth::user()->id)->get();
        $reviews = Review::where('user_id', Auth::user()->id)->get();


        return view('admin.home', compact('messages', 'reviews'));
    }
}
