<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User_category;
use App\Permission;
use App\Category_permission;
use Auth;

class UserCategory extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $categoriess=User_category::all();

      if(Auth::user()->category_id ==11){
        $permissions=Permission::all();
        $categories=User_category::where('deleted',false)->get();
      }else{
        $permissions=Permission::where('permission_id','!=',3)->get();
        $categories=User_category::where('deleted',false)->where('user_category_id','!=',11)->get();
      }


      return view('pages.user_categorys')->with('categories',$categories)->with('permissions',$permissions)->with('categoriess',$categoriess);
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
      $category=new User_category();

      $this->validate(request(),[
          'name'=>'required',
          'description'=>'required',
        ]);

      //  User::create($request->all());


        $category->category_name=$request->input('name');
        $category->category_description=$request->input('description');
        $category->deleted=false;


        $category->save();
        $category_id=$category->user_category_id;

       if (isset($_POST['permissions'])) {
                foreach (($_POST['permissions']) as $permission){
                    $perm=new Category_permission();
                    $perm->category_id=$category_id;
                    $perm->permission_id=$permission;
                    $perm->deleted=false;
                    $perm->save();
                  }
            }


      //  auth()->login();

        return redirect('/')->with('success','Category added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User_category $category)
    {
      $permissions=Permission::all();
      $myperms=Category_permission::where('category_id',$category->user_category_id)->get();
        return view('pages.edit_category')->with('category',$category)->with('permissions',$permissions)->with('myperms',$myperms);
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

      $category=User_category::find($id);

      $this->validate(request(),[
          'name'=>'required',
          'description'=>'required',
        ]);

      //  User::create($request->all());


        $category->category_name=$request->input('name');
        $category->category_description=$request->input('description');
        $category->deleted=false;


        $category->save();
        //$category_id=$category->user_category_id;

       if (isset($_POST['permissions'])) {
                foreach (($_POST['permissions']) as $permission){
                    $perm=new Category_permission();
                    $perm->category_id=$id;
                    $perm->permission_id=$permission;
                    $perm->deleted=false;
                    $perm->save();
                  }
            }


      //  auth()->login();

        return redirect('/')->with('success','Category updated');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function trash($id)
    {
      $category=User_category::find($id);
      $category->deleted=true;
      $category->save();
      return redirect('/UserCategories');
    }

    public function restore($id)
    {
      $category=User_category::find($id);
      $category->deleted=false;
      $category->save();
      return redirect('/UserCategories');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $category=User_category::find($id);
      $permissions=Category_permission::where('category_id',$id);
      $category->delete();
      $permissions->delete();

      return redirect('/UserCategories');
    }

    public function destroyperm($id)
    {
      $perm=Category_permission::find($id);
      $perm->delete();

      return redirect('/UserCategories');
    }
}
