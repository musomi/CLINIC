<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\User_category;
use Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showAdmins()
    {
        $admins=User::where('category_id',11)->orwhere('category_id',12)->get();
        return view('pages.view_admins')->with('admins',$admins);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $admins=User::where('name',$request->input('jina'))->orwhere('email',$request->input('jina'))->orwhere('phone',$request->input('jina'))->get();
        return view('pages.view_admins')->with('admins',$admins);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showClients(User $user)
    {
      $my_users=User::where('register_admin',$user->user_id)->get();
      $categories=User_category::where('user_category_id','!=',11)->get();
      return view('pages.view_clients')->with('my_users',$my_users)->with('categories',$categories)->with('user',$user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
      $category=User_category::find($user->category_id);
      if(Auth::user()->category_id == 11){
      $categoriess=User_category::where('deleted',false)->get();
    }else{
      $categoriess=User_category::where('deleted',false)->where('user_category_id','!=',11)->get();
    }
        return view ('pages.user_profile')->with('category',$category)->with('categoriess',$categoriess)->with('user',$user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $user=User::find($id);


      if ($request->file('select_file') != "") {

        $this->validate($request,[
        'select_file'=> 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $image=$request->file('select_file');
        $new_name=rand().'.'.$image->getClientOriginalExtension();
        $image->move(public_path("images"),$new_name);

      }else{
        $new_name=$user->image;
      }


      //  User::create($request->all());


        $user->name=$request->input('name');
        $user->email=$request->input('email');
        $user->phone=$request->input('phone');
        $user->about=$request->input('about');
        $user->image=$new_name;


        $user->save();

      //  auth()->login();

        return redirect('/UserProfile/'.$id)->with('success','User Profile updated');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function ChangeCategory(Request $request, $id)
    {
      $user=User::find($id);

        $user->category_id=$request->input('category');
        $user->save();

      //  auth()->login();

        return redirect('/UserProfile/'.$id)->with('success','User Profile updated');
    }

    public function trash($id)
    {
      $user=User::find($id);
      $user->status=false;
      $user->save();
      return redirect('/')->with('success','User has been deactivated');
    }

    public function restore($id)
    {
      $user=User::find($id);
      $user->status=true;
      $user->save();
      return redirect('/')->with('success','User has been activated');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $user=User::find($id);
      $user->delete();


      return redirect('/')->with('success','User deleted');
    }
}
