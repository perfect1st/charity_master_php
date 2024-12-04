<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Article;
use App\Models\Department;
use App\Models\Setting;

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
            $setting = Setting::find(1);
            $userDeps=Department::where('department_isactive','active')->where('price',null)->get();
            return view('home',compact('userDeps','setting'));
        }
        // return user pages
        else
        {
            
            $setting = Setting::find(1);
        $settingArticle= Article::find(14);
        $newsbutton=Department::find(7)->articles->where('articles_isactive', 'active')->take(2);

            return view('home_user',[
            "setting"=>$setting,
            "settingArticle"=>$settingArticle,
            "newsbutton"=>$newsbutton
            ]);
            //return redirect()->route('welcomeHome');
           // return Redirect::to('/');
        }
    }
}
