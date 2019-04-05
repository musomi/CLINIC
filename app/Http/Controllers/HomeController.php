<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patient;
use Auth;
use App\User;

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
      if(Auth::user()->category_id ==11){
        $number=count(User::where('category_id',12)->get());
        $other_users=count(User::where('category_id','!=',12)->where('category_id','!=',11)->get());
        $patients=count(Patient::all());

        $admins=User::where('category_id',11)->orwhere('category_id',12)->orwhere('category_id',15)->get();
        return view('pages.view_admins')->with('admins',$admins)->with('number',$number)->with('patients',$patients)->with('other_users',$other_users);
    }else{
      $patients=Patient::where('register_admin',Auth::user()->register_admin)->get();
      return view('pages.view_all_patients')->with('patients',$patients);

    }

    }

    public function test()
    {
        return view('pages.test');
    }

    /**
     * Show the application register page.
     *
     * @return \Illuminate\Http\Response
     */
    public function register()
    {
        return view('pages.register');
    }

}
