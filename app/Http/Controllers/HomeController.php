<?php

namespace App\Http\Controllers;

use function compact;
use App\Task;
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
	    $tasks = Task::with('user')->where('user_id',auth()->id())->latest('updated_at')->get();
        return view('home',compact( 'tasks'));
    }
}
