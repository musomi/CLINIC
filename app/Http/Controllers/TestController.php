<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Test;
use App\Patient;
use App\Mykey;
use Auth;

class TestController extends Controller
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
    public function store(Request $request, $id)
    {

      $test=new Test;
      $patient=Patient::find($request->input('patient_id'));
      $patient->stage=2;
      $patient->save();

      $test->treatment_id=$id;
      $test->patient_id=$request->input('patient_id');
      $test->test_result=$request->input('results');
      $test->disease=$request->input('disease');
      $test->doctor=Auth::user()->name;

      $test->save();
      return redirect ('/home')->with('success','Test sent');

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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$testid)
    {

      $test=Test::find($testid);
      $patient=Patient::find($test->patient_id);
      $mykey=$patient->key_id;

      $test->submited=true;
      $test->test_result=$request->input('result');
      $test->disease=$request->input('disease');
      $test->price=$request->input('testprice');
      $test->doctor=Auth::user()->name;

      $test->save();

      if(count(Test::where('treatment_key',$test->treatment_key)->where('submited',false)->get()) > 0){
      return redirect('/test/'.$mykey.'/patient')->with('success','Test saved successfully');
      }else{

        $patient->stage=2;
        $patient->save();
          return redirect('/home')->with('success','Test saved successfully');
      }

      //echo $mykeys->treatment_id;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
