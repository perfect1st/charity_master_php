<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
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
        if(Auth::user()->rule_id==1)
        {
            $userDeps=Department::where('department_isactive','active')->where('price',null)->get();
            return view('home',compact('userDeps'));
        }
        // return user pages
        else
        {
             $userDeps=Department::where('department_isactive','active')->where('price',null)->get();
            return view('home',compact('userDeps'));
            //return redirect()->route('welcomeHome');
           // return Redirect::to('/');
        }
    }
}
